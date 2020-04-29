<?php
//スクリプト一元管理
function my_enqueue_scripts() {
    wp_enqueue_style( 'font-awesome', 'https://use.fontawesome.com/releases/v5.6.1/css/all.css' );
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'main_js', get_template_directory_uri(). '/assets/js/main.js' );
    wp_enqueue_style( 'main_styles', get_template_directory_uri(). '/assets/css/styles.min.css' );
    if( is_home() ){
        wp_enqueue_style( 'slick_carousel', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '1.0.0');
        wp_enqueue_script( 'slick-carousel', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array( 'jquery' ), '1.0.0', true );
        wp_enqueue_script( 'home_js', get_template_directory_uri(). '/assets/js/home.js', array( 'jquery' ), '1.0.0', true );
    }
}
add_action( 'wp_enqueue_scripts', 'my_enqueue_scripts' );

//<title>タグを出力する
add_theme_support( 'title-tag' );

//タイトルの区切り文字変更
add_filter( 'document_title_separator', 'my_document_title_separator' );
function my_document_title_separator($separator) {
    $separator = '|';
    return $separator;
}

//タイトルのカスタマイズ
add_filter( 'document_title_parts', 'my_document_title_parts' );
function my_document_title_parts($title) {
    if( is_home() ){
        unset($title['tagline']);
        $title['title'] = 'BISTRO CALMEは、カジュアルなワインバーよりなビストロです。';
    }
    return $title;
}

// アイキャッチ画像を利用できるようにする
add_theme_support( 'post-thumbnails' );

//カスタムメニュー機能を使用可能にする
add_theme_support( 'menus' );

//最新記事トップページだけ表示する投稿数を変える
function my_pre_get_posts($query){
    //管理画面、メインクエリ以外には設定しない
    if( is_admin() || ! $query->is_main_query() ) {
        return;
    }

    //トップページの場合
    if ( $query->is_home() ) {
        $query->set( 'posts_per_page', 3 );
        return;
    }
}
add_action( 'pre_get_posts', 'my_pre_get_posts' );

//コンタクトページでのHTML自動生成機能を停止
function my_wpautop() {
    if( is_page( 'contact' ) ) {
        remove_filter( 'the_contact', 'wpautop' );
    }
}
add_action( 'wp', 'my_wpautop');

