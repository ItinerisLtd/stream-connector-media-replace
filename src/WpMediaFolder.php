<?php

declare(strict_types=1);

namespace Itineris\StreamConnectorMediaReplace;

use WP_Stream\Connector;

use function sprintf;

class WpMediaFolder extends Connector
{
    /**
     * Connector slug
     *
     * @var string
     */
    public $name = 'wp-media-folder';

    /**
     * Actions registered for this connector
     *
     * @var array
     */
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

    /**
     * Add action links to Stream drop row in admin list screen
     *
     * @param array             $links  Previous links registered.
     * @param \WP_Stream\Record $record Stream record.
     *
     * @filter wp_stream_action_links_{connector}
     *
     * @return array Action links
     */
    public function action_links($links, $record): array
    {
        if (! $record->object_id) {
            return $links;
        }

        $editLink = get_edit_post_link((int) $record->object_id);
        if ($editLink) {
            $links[esc_html__('Edit Media', 'stream-connector-media-replace')] = esc_url($editLink);
        }

        $permalink = get_permalink((int) $record->object_id);
        if ($permalink) {
            $links[esc_html__('View', 'stream-connector-media-replace')] = esc_url($permalink);
        }

        return $links;
    }

    public function callback_wpmf_after_replace(int $attachmentId): void
    {
        $title = get_the_title($attachmentId);
        $url = (string) wp_get_attachment_url($attachmentId);

        $message = sprintf(
            /* translators: %s is the media item name */
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
