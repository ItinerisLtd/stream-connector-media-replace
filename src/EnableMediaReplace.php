<?php

declare(strict_types=1);

namespace Itineris\StreamConnectorMediaReplace;

use WP_Stream\Connector;

class EnableMediaReplace extends Connector {
    public $name = 'enable-media-replace';

    public $actions = [
        'enable-media-replace-upload-done',
    ];

    public function get_label(): string
    {
        return __('Enable Media Replace', 'stream-connector-media-replace');
    }

    public function get_context_labels(): array
    {
        return [
            'media' => __('Media', 'stream-connector-media-replace'),
        ];
    }

    public function get_action_labels(): array
    {
        return [
            'replaced' => __('Replaced', 'stream-connector-media-replace'),
        ];
    }

    public function callback_enable_media_replace_upload_done(string $targetUrl, string $sourceUrl, int $postId): void
    {
        $title = get_the_title($postId);

        $message = sprintf(
            __('"%s" file replaced', 'stream-connector-media-replace'),
            $title,
        );

        $this->log(
            $message,
            [
                'title'      => $title,
                'source_url' => $sourceUrl,
                'target_url' => $targetUrl,
            ],
            $postId,
            'media',
            'replaced',
        );
    }
}
