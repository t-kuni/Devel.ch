<?php

namespace App\Http\Controllers;

use League\CommonMark\Inline\Renderer\ImageRenderer;
use Illuminate\Http\Request;
use App\Thread;
use App\Image;
use DB;
use App\Http\Requests\AddThreadRequest;
use Markdown;
use League\CommonMark\Inline\Element\AbstractInline;
use League\CommonMark\ElementRendererInterface;
use League\CommonMark\Inline\Element\Image As ElemImg;
use League\CommonMark\Util\RegexHelper;
use League\CommonMark\HtmlElement;

class ThreadListController extends Controller
{
    //
    public function index() {
        $threads = Thread::all();

        return view('thread_list', [
            'threads' => $threads,
        ]);
    }

    public function addThread(AddThreadRequest $request) {
        $env = app('markdown.environment');
        $env->addInlineRenderer('League\CommonMark\Inline\Element\Image', new CustomImageRenderer());

        DB::transaction(function () use ($request) {
            $image = null;
            if ($request->image !== null) {
                $image = new Image();
                $image->image = file_get_contents($request->image);
                $image->mime_type = $request->image->getMimeType();
                $image->save();
            }

            $thread = new Thread();
            $thread->title    = $request->title;
            $thread->password = $request->password;
            $thread->text     = Markdown::convertToHtml($request->text);
            $thread->image_id = $request->image !== null ? $image->id : null;
            $thread->save();
        dd($thread->text);
        });

        return redirect()->route('addThread');
    }
}

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
