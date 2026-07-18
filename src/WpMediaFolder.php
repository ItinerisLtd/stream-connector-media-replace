<?php

declare(strict_types=1);

namespace Itineris\StreamConnectorMediaReplace;

use WP_Stream\Connector;

class WpMediaFolder extends Connector {
    public $name = 'wp-media-folder';

    public $actions = [
        'wpmf_after_replace',
    ];

    public function get_label(): string
    {
        return __('WP Media Folder', 'stream-connector-media-replace');
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

    public function callback_wpmf_after_replace(int $attachmentId): void
    {
        $title = get_the_title($attachmentId);
        $url = (string) wp_get_attachment_url($attachmentId);

        $message = sprintf(
            __('"%s" file replaced', 'stream-connector-media-replace'),
            $title,
        );

        $this->log(
            $message,
            [
                'title' => $title,
                'url'   => $url,
            ],
            $attachmentId,
            'media',
            'replaced',
        );
    }
}
