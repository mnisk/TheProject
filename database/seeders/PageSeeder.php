<?php

namespace Database\Seeders;

use Botble\Base\Models\MetaBox as MetaBoxModel;
use Botble\Base\Supports\BaseSeeder;
use Botble\Language\Models\LanguageMeta;
use Botble\Page\Models\Page;
use Botble\LanguageAdvanced\Models\PageTranslation;
use Botble\Slug\Models\Slug;
use Html;
use Illuminate\Support\Str;
use SlugHelper;

class PageSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = [
            [
                'name'     => 'Homepage',
                'content'  =>
                    Html::tag('div', '[posts-slider title="" filter_by="featured" limit="4" include="" style="1"][/posts-slider]') .
                    Html::tag('div', '[posts-slider title="Editor\'s picked" filter_by="posts-collection" posts_collection_id="1" limit=6 style="2" description="The featured articles are selected by experienced editors. It is also based on the reader\'s rating. These posts have a lot of interest."][/posts-slider]') .
                    Html::tag('div', '[recent-posts title="Recent posts" subtitle="Latest" limit="3" background_style="background-white" show_follow_us_section="1" tab_post_limit="4" ads_location="bottom-sidebar-ads"][/recent-posts]') .
                    Html::tag('div', '[videos-posts title="Latest Videos" subtitle="In motion"][/videos-posts]') .
                    Html::tag('div', '[categories-tab-posts title="Popular" subtitle="P" limit="5" categories_ids="1,2,3,4" show_follow_us_section="1" ads_location="top-sidebar-ads"][/categories-tab-posts]') .
                    Html::tag('div', '[most-comments title="Most comments" limit="8" subtitle="M"][/most-comments]') .
                    Html::tag('div', '[posts-collection title="Recommended" subtitle="R" limit="4" posts_collection_id="2" background_style="background-white"][/posts-collection]') .
                    Html::tag('div', '[theme-galleries title="@ OUR GALLERIES" limit="7" subtitle="O"][/theme-galleries]')
                ,
                'template' => 'homepage',
            ],
            [
                'name'     => 'Home 2',
                'content'  =>
                    Html::tag('div', '[posts-slider filter_by="featured" limit="6" style="3"][/posts-slider]') .
                    Html::tag('div', '[categories-tab-posts title="Popular" subtitle="P" limit="5" categories_ids="1,2,3,4" show_follow_us_section="1" ads_location="top-sidebar-ads"][/categories-tab-posts]') .
                    Html::tag('div', '[most-comments title="Most comments" limit="8" subtitle="M"][/most-comments]') .
                    Html::tag('div', '[videos-posts title="Latest Videos" subtitle="In motion"][/videos-posts]') .
                    Html::tag('div', '[posts-slider title="Editor\'s picked" filter_by="posts-collection" posts_collection_id="1" limit=6 style="2" description="The featured articles are selected by experienced editors. It is also based on the reader\'s rating. These posts have a lot of interest."][/posts-slider]') .
                    Html::tag('div', '[recent-posts title="Recent posts" subtitle="Latest" limit="3" background_style="background-white" show_follow_us_section="1" tab_post_limit="4" ads_location="bottom-sidebar-ads"][/recent-posts]')
                ,
                'template' => 'homepage2',
            ],
            [
                'name'     => 'Home 3',
                'content'  =>
                    Html::tag('div', '[posts-slider filter_by="featured" limit="6" style="4"][/posts-slider]') .
                    Html::tag('div', '[posts-grid title="Featured Posts" subtitle="News" limit="6" order_by="views" order="desc"][/posts-grid]') .
                    Html::tag('div', '[most-comments title="Most comments" limit="8" subtitle="M"][/most-comments]') .
                    Html::tag('div', '[videos-posts title="Latest Videos" subtitle="In motion"][/videos-posts]') .
                    Html::tag('div', '[posts-slider title="Editor\'s picked" filter_by="posts-collection" posts_collection_id="1" limit=6 style="2" description="The featured articles are selected by experienced editors. It is also based on the reader\'s rating. These posts have a lot of interest."][/posts-slider]') .
                    Html::tag('div', '[recent-posts title="Recent posts" subtitle="Latest" limit="3" background_style="background-white" show_follow_us_section="1" tab_post_limit="4" ads_location="bottom-sidebar-ads"][/recent-posts]')
                ,
                'template' => 'homepage2',
            ],
            [
                'name'     => 'Blog',
                'content'  => Html::tag('div', '[posts-listing layout="list"][/posts-listing]'),
                'template' => 'default',
            ],
            [
                'name'     => 'Category List',
                'content'  => Html::tag('div', '[posts-listing layout="list"][/posts-listing]'),
                'template' => 'no-breadcrumbs',
            ],
            [
                'name'     => 'Category grid',
                'content'  => Html::tag('div', '[posts-listing layout="grid"][/posts-listing]'),
                'template' => 'full',
            ],
            [
                'name'     => 'Category metro',
                'content'  => Html::tag('div', '[posts-listing layout="metro"][/posts-listing]'),
                'template' => 'full',
            ],
            [
                'name'     => 'Contact',
                'content'  =>
                    Html::tag('div', '[contact-form title="Get in Touch"][/contact-form]') .
                    Html::tag('h3', 'Directions') .
                    Html::tag('div', '[google-map]North Link Building, 10 Admiralty Street, 757695 Singapore[/google-map]')
                ,
                'template' => 'default',
            ],
            [
                'name'     => 'About Us',
                'content'  =>
                    Html::tag('div', file_get_contents(database_path('seeders/stubs/contact.html')), ['class' => 'raw-html-embed']) .
                    Html::tag('h3', 'Address') .
                    Html::tag('div', '[google-map]North Link Building, 10 Admiralty Street, 757695 Singapore[/google-map]')
                ,
                'template' => 'default',
            ],
            [
                'name'     => 'Cookie Policy',
                'content'  => Html::tag('h3', 'EU Cookie Consent') .
                    Html::tag(
                        'p',
                        'To use this website we are using Cookies and collecting some Data. To be compliant with the EU GDPR we give you to choose if you allow us to use certain Cookies and to collect some Data.'
                    ) .
                    Html::tag('h4', 'Essential Data') .
                    Html::tag(
                        'p',
                        'The Essential Data is needed to run the Site you are visiting technically. You can not deactivate them.'
                    ) .
                    Html::tag(
                        'p',
                        '- Session Cookie: PHP uses a Cookie to identify user sessions. Without this Cookie the Website is not working.'
                    ) .
                    Html::tag(
                        'p',
                        '- XSRF-Token Cookie: Laravel automatically generates a CSRF "token" for each active user session managed by the application. This token is used to verify that the authenticated user is the one actually making the requests to the application.'
                    ),
                'template' => 'default',
            ]
        ];

        $translationsPage = [
            [
                'name'     => 'Trang ch???',
                'content'  =>
                    Html::tag('div', '[posts-slider title="" filter_by="featured" limit="4" include="" style="1"][/posts-slider]') .
                    Html::tag('div', '[posts-slider title="Editor\'s picked" filter_by="posts-collection" posts_collection_id="1" limit=6 style="2" description="The featured articles are selected by experienced editors. It is also based on the reader\'s rating. These posts have a lot of interest."][/posts-slider]') .
                    Html::tag('div', '[recent-posts title="B??i vi???t m???i" subtitle="Latest" limit="3" show_follow_us_section="1"][/recent-posts]') .
                    Html::tag('div', '[categories-tab-posts title="B??i vi???t ???????c quan t??m" subtitle="P" limit="5" categories_ids="1,2,3,4" show_follow_us_section="1" ads_location="top-sidebar-ads"][/categories-tab-posts]') .
                    Html::tag('div', '[posts-grid title="B??i vi???t n???i b???t" subtitle="News" categories="" categories_exclude="" style="2" limit="6"][/posts-grid]') .
                    Html::tag('div', '[theme-galleries title="@ OUR GALLERIES" subtitle="In motion" limit="7"][/theme-galleries]')
                ,
            ],
            [
                'name'     => 'Trang ch??? 2',
                'content'  =>
                    Html::tag('div', '[posts-slider filter_by="featured" limit="6" style="3"][/posts-slider]') .
                    Html::tag('div', '[categories-tab-posts title="Popular" subtitle="P" limit="5" categories_ids="1,2,3,4" show_follow_us_section="1" ads_location="top-sidebar-ads"][/categories-tab-posts]') .
                    Html::tag('div', '[most-comments title="Most comments" limit="8" subtitle="M"][/most-comments]') .
                    Html::tag('div', '[videos-posts title="Latest Videos" subtitle="In motion"][/videos-posts]') .
                    Html::tag('div', '[posts-slider title="Editor\'s picked" filter_by="posts-collection" posts_collection_id="1" limit=6 style="2" description="The featured articles are selected by experienced editors. It is also based on the reader\'s rating. These posts have a lot of interest."][/posts-slider]') .
                    Html::tag('div', '[recent-posts title="Recent posts" subtitle="Latest" limit="3" background_style="background-white" show_follow_us_section="1" tab_post_limit="4" ads_location="bottom-sidebar-ads"][/recent-posts]')
                ,
            ],
            [
                'name'     => 'Trang ch??? 3',
                'content'  =>
                    Html::tag('div', '[posts-slider filter_by="featured" limit="6" style="4"][/posts-slider]') .
                    Html::tag('div', '[posts-grid title="Featured Posts" subtitle="News" limit="6" order_by="views" order="desc"][/posts-grid]') .
                    Html::tag('div', '[most-comments title="Most comments" limit="8" subtitle="M"][/most-comments]') .
                    Html::tag('div', '[videos-posts title="Latest Videos" subtitle="In motion"][/videos-posts]') .
                    Html::tag('div', '[posts-slider title="Editor\'s picked" filter_by="posts-collection" posts_collection_id="1" limit=6 style="2" description="The featured articles are selected by experienced editors. It is also based on the reader\'s rating. These posts have a lot of interest."][/posts-slider]') .
                    Html::tag('div', '[recent-posts title="Recent posts" subtitle="Latest" limit="3" background_style="background-white" show_follow_us_section="1" tab_post_limit="4" ads_location="bottom-sidebar-ads"][/recent-posts]')
                ,
            ],

            [
                'name'     => 'Tin t???c',
                'content'  => Html::tag('div', '[categories-big limit="12"][/categories-big]'),
            ],
            [
                'name'     => 'Tin t???c danh s??ch',
                'content'  => Html::tag('div', '[posts-listing layout="list"][/posts-listing]'),
            ],
            [
                'name'     => 'Tin t???c d???ng c???t',
                'content'  => Html::tag('div', '[posts-listing layout="grid"][/posts-listing]'),
            ],
            [
                'name'     => 'Tin t???c metro',
                'content'  => Html::tag('div', '[posts-listing layout="metro"][/posts-listing]'),
            ],
            [
                'name'    => 'Li??n h???',
                'content' =>
                    Html::tag('div', '[contact-form title="Li??n h???"][/contact-form]') .
                    Html::tag('h3', '?????a ch???') .
                    Html::tag('div', '[google-map]North Link Building, 10 Admiralty Street, 757695 Singapore[/google-map]')
            ],
            [
                'name'     => 'V??? ch??ng t??i',
                'content'  =>
                    Html::tag('div', file_get_contents(database_path('seeders/stubs/contact-vi.html')), ['class' => 'raw-html-embed'])
                ,
            ],
            [
                'name'     => 'Cookie Policy',
                'content'  => Html::tag('h3', 'EU Cookie Consent') .
                    Html::tag(
                        'p',
                        '????? s??? d???ng trang web n??y, ch??ng t??i ??ang s??? d???ng Cookie v?? thu th???p m???t s??? D??? li???u. ????? tu??n th??? GDPR c???a Li??n minh Ch??u ??u, ch??ng t??i cho b???n l???a ch???n n???u b???n cho ph??p ch??ng t??i s??? d???ng m???t s??? Cookie nh???t ?????nh v?? thu th???p m???t s??? D??? li???u.'
                    ) .
                    Html::tag('h4', 'D??? li???u c???n thi???t') .
                    Html::tag(
                        'p',
                        'D??? li???u c???n thi???t l?? c???n thi???t ????? ch???y Trang web b???n ??ang truy c???p v??? m???t k??? thu???t. B???n kh??ng th??? h???y k??ch ho???t ch??ng.'
                    ) .
                    Html::tag(
                        'p',
                        '- Session Cookie: PHP s??? d???ng Cookie ????? x??c ?????nh phi??n c???a ng?????i d??ng. N???u kh??ng c?? Cookie n??y, trang web s??? kh??ng ho???t ?????ng.'
                    ) .
                    Html::tag(
                        'p',
                        '- XSRF-Token Cookie: Laravel t??? ?????ng t???o "token" CSRF cho m???i phi??n ng?????i d??ng ??ang ho???t ?????ng do ???ng d???ng qu???n l??. Token n??y ???????c s??? d???ng ????? x??c minh r???ng ng?????i d??ng ???? x??c th???c l?? ng?????i th???c s??? ????a ra y??u c???u ?????i v???i ???ng d???ng.'
                    ),
            ],
        ];

        Page::truncate();
        PageTranslation::truncate();
        Slug::where('reference_type', Page::class)->delete();
        MetaBoxModel::where('reference_type', Page::class)->delete();
        LanguageMeta::where('reference_type', Page::class)->delete();

        foreach ($pages as $index => $item) {
            $item['user_id'] = 1;
            $page = Page::create($item);

            Slug::create([
                'reference_type' => Page::class,
                'reference_id'   => $page->id,
                'key'            => Str::slug($page->name),
                'prefix'         => SlugHelper::getPrefix(Page::class),
            ]);
        }

        foreach ($translationsPage as $index => $item) {
            $item['lang_code'] = 'vi';
            $item['pages_id'] = $index + 1;

            PageTranslation::insert($item);
        }
    }
}
