<?php

declare(strict_types=1);

namespace Itineris\StreamConnectorMediaReplace;

use WP_Stream\Connector;

use function sprintf;

class EnableMediaReplace extends Connector
{
    /**
     * Connector slug
     *
     * @var string
     */
    public $name = 'enable-media-replace';

    /**
     * Actions registered for this connector
     *
     * @var array
     */
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

    public function callback_enable_media_replace_upload_done(string $targetUrl, string $sourceUrl, int $postId): void
    {
        $title = get_the_title($postId);

        $message = sprintf(
            /* translators: %s is the media item name */
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
