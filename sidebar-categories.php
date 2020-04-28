<aside class="archive">
    <h2 class="archive_title">カテゴリ 一覧</h2>
    <ul class="archive_list">
        <?php
        wp_list_categories(
            array(
                'title_li' => "" //見出し削除
            )
        );
        ?>
    </ul>
</aside>
