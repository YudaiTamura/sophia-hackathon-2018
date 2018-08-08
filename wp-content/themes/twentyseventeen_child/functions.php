<?php
//add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' ); 
function theme_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}

remove_filter('the_content', 'wpautop');
remove_filter('the_excerpt', 'wpautop');

add_action('admin_menu', 'remove_menu');
function remove_menu()
{
    remove_menu_page('index.php'); // ダッシュボード
    remove_menu_page('edit.php'); // 投稿
    //remove_menu_page('upload.php'); // メディア
    //remove_menu_page('link-manager.php'); // リンク
    //remove_menu_page('edit.php?post_type=page'); // 固定ページ
    remove_menu_page('edit-comments.php'); // コメント
    //remove_menu_page('themes.php'); // 概観
    //remove_menu_page('plugins.php'); // プラグイン
    //remove_menu_page('users.php'); // ユーザー
    //remove_menu_page('tools.php'); // ツール
    //remove_menu_page('options-general.php'); // 設定
}

add_action('init', 'add_websites_post_type');
function add_websites_post_type()
{
    $membersParams = array(
        'labels' => array(
            'name' => '過去の募金',
            'singular_name' => '過去の募金',
            'add_new' => '過去の募金を追加',
            'add_new_item' => '新規過去の募金を追加',
            'edit_item' => '編集',
            'new_item' => '新規過去の募金',
            'all_items' => '全ての過去の募金',
            'view_item' => '過去の募金を見る',
            'search_items' => '過去の募金を探す',
            'not_found' => '見つかりませんでした',
            'not_found_in_trash' => 'ゴミ箱の中にはありませんでした',
            'enter_title_here' => '過去の募金名を入力',
        ),
        'public' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        "supports" => array("title", "thumbnail"),
        'menu_position' => 8,
    );
    register_post_type('past-donation', $membersParams);


    $myPageParams = array(
        'labels' => array(
            'name' => 'マイページ',
            'singular_name' => 'マイページ',
            'add_new' => 'マイページを追加',
            'add_new_item' => '新規マイページを追加',
            'edit_item' => '編集',
            'new_item' => '新規マイページ',
            'all_items' => '全てのマイページ',
            'view_item' => 'マイページを見る',
            'search_items' => 'マイページを探す',
            'not_found' => '見つかりませんでした',
            'not_found_in_trash' => 'ゴミ箱の中にはありませんでした',
            'enter_title_here' => 'マイページ名を入力',
        ),
        'public' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        "supports" => array("title", "thumbnail"),
        'menu_position' => 9,
    );
    register_post_type('mypage', $myPageParams);


    $projectParams = array(
        'labels' => array(
            'name' => 'プロジェクト',
            'singular_name' => 'プロジェクト',
            'add_new' => 'プロジェクトを追加',
            'add_new_item' => '新規プロジェクトを追加',
            'edit_item' => '編集',
            'new_item' => '新規プロジェクト',
            'all_items' => '全てのプロジェクト',
            'view_item' => 'プロジェクトを見る',
            'search_items' => 'プロジェクトを探す',
            'not_found' => '見つかりませんでした',
            'not_found_in_trash' => 'ゴミ箱の中にはありませんでした',
            'enter_title_here' => 'プロジェクト名を入力',
        ),
        'public' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        "supports" => array("title", "thumbnail"),
        'menu_position' => 10,
    );
    register_post_type('project', $projectParams);
}


if (function_exists("register_field_group")) {
    register_field_group(
        array(
            'id' => 'acf_%e9%81%8e%e5%8e%bb%e3%81%ae%e5%8b%9f%e9%87%91',
            'title' => '過去の募金',
            'fields' => array(
                array(
                    'key' => 'field_5b6933680b1e3',
                    'label' => '募金された金額',
                    'name' => 'past-donation__donated-amount',
                    'type' => 'number',
                    'required' => 1,
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'min' => '',
                    'max' => '',
                    'step' => '',
                ),
                array(
                    'key' => 'field_5b6938220b1e4',
                    'label' => '募金した人数',
                    'name' => 'past-donation__donated-people',
                    'type' => 'number',
                    'required' => 1,
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'min' => '',
                    'max' => '',
                    'step' => '',
                ),
                array(
                    'key' => 'field_5b69383e0b1e5',
                    'label' => '実績',
                    'name' => 'past-donation__achievement',
                    'type' => 'textarea',
                    'required' => 1,
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'formatting' => 'html',
                    'maxlength' => '',
                ),
                array(
                    'key' => 'field_5b6938d10b1e6',
                    'label' => '募金の募集してた期間',
                    'name' => 'past-donation__term',
                    'type' => 'text',
                    'required' => 1,
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'formatting' => 'html',
                    'maxlength' => '',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'past-donation',
                        'order_no' => 0,
                        'group_no' => 0,
                    ),
                ),
            ),
            'options' => array(
                'position' => 'normal',
                'layout' => 'no_box',
                'hide_on_screen' => array(),
            ),
            'menu_order' => 0,
        )
    );

    register_field_group(array(
        'id' => 'acf_%e3%83%9e%e3%82%a4%e3%83%9a%e3%83%bc%e3%82%b8',
        'title' => 'マイページ',
        'fields' => array(
            array(
                'key' => 'field_5b695605f6711',
                'label' => '総募金額',
                'name' => 'myPage__donation-amount',
                'type' => 'number',
                'required' => 1,
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'min' => '',
                'max' => '',
                'step' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'mypage',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array(),
        ),
        'menu_order' => 0,
    ));
    
    register_field_group(array (
        'id' => 'acf_%e7%8f%be%e5%9c%a8%e3%81%ae%e3%83%97%e3%83%ad%e3%82%b8%e3%82%a7%e3%82%af%e3%83%88',
        'title' => '現在のプロジェクト',
        'fields' => array (
            array (
                'key' => 'field_5b6a89f8fb133',
                'label' => '目標金額',
                'name' => 'goal',
                'type' => 'number',
                'required' => 1,
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'min' => '',
                'max' => '',
                'step' => '',
            ),
            array (
                'key' => 'field_5b6a8a21fb134',
                'label' => 'これまでに募金された金額',
                'name' => 'donated-amount',
                'type' => 'number',
                'required' => 1,
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'min' => '',
                'max' => '',
                'step' => '',
            ),
            array (
                'key' => 'field_5b6a8a4efb135',
                'label' => '募金した人数',
                'name' => 'numberOfPeople',
                'type' => 'number',
                'required' => 1,
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'min' => '',
                'max' => '',
                'step' => '',
            ),
            array (
                'key' => 'field_5b6a8a98fb136',
                'label' => '用途',
                'name' => 'forWhat',
                'type' => 'textarea',
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'formatting' => 'br',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'project',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
}