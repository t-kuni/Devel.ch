select threads.*, MAX(updated_times.update_time) AS update_time
from threads
LEFT OUTER JOIN (SELECT id AS thread_id, created_at AS update_time FROM threads
                 UNION
                 SELECT thread_id AS thread_id, created_at AS update_time FROM thread_comments) AS updated_times
ON threads.id = updated_times.thread_id
GROUP BY threads.id
ORDER BY update_time DESC;