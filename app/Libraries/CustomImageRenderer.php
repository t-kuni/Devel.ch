<?php

namespace App\Libraries;

use Markdown;
use League\CommonMark\Inline\Renderer\ImageRenderer;
use League\CommonMark\Inline\Element\AbstractInline;
use League\CommonMark\ElementRendererInterface;
use League\CommonMark\Inline\Element\Image As ElemImg;
use League\CommonMark\Util\RegexHelper;
use League\CommonMark\HtmlElement;

class CustomImageRenderer extends ImageRenderer {
    public function render(AbstractInline $inline, ElementRendererInterface $htmlRenderer)
    {
        if (!($inline instanceof ElemImg)) {
            throw new \InvalidArgumentException('Incompatible inline type: ' . get_class($inline));
        }

        $attrs = [
            'class' => 'img-fluid',
            'style' => 'max-width:100%; height:auto',
        ];
        foreach ($inline->getData('attributes', []) as $key => $value) {
            $attrs[$key] = $htmlRenderer->escape($value, true);
        }

        $forbidUnsafeLinks = $this->config->getConfig('safe') || !$this->config->getConfig('allow_unsafe_links');
        if ($forbidUnsafeLinks && RegexHelper::isLinkPotentiallyUnsafe($inline->getUrl())) {
            $attrs['src'] = '';
        } else {
            $attrs['src'] = $htmlRenderer->escape($inline->getUrl(), true);
        }

        $alt = $htmlRenderer->renderInlines($inline->children());
        $alt = preg_replace('/\<[^>]*alt="([^"]*)"[^>]*\>/', '$1', $alt);
        $attrs['alt'] = preg_replace('/\<[^>]*\>/', '', $alt);

        if (isset($inline->data['title'])) {
            $attrs['title'] = $htmlRenderer->escape($inline->data['title'], true);
        }

        return new HtmlElement('img', $attrs, '', true);
    }
}
