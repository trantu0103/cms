<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Tag;
use App\Post;
use App\Category;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category1 = Category::create([
            'name' => 'iphone'
        ]);

        $author1 = App\User::create([
            'name' => 'Hoai Tien',
            'email' => 'hoaitien@aptech.com',
            'password' => Hash::make('password')
        ]);
        $author2 = App\User::create([
            'name' => 'Thu Trang',
            'email' => 'thutrang@aptech.com',
            'password' => Hash::make('password')
        ]);

        $category2 = Category::create([
            'name' => 'samsung'
        ]);
        $category3 = Category::create([
            'name' => 'huawei'
        ]);

        $post1 = Post::create([
            'title' => 'Huawei P30 Lite',
            'description' => 'What looks like a Huawei P30, feels like a P30, snaps photos like a P30, and yet it\'s cheaper and lighter?',
            'content' => 'Huawei\'s Lite models have often been left out of the spotlight in favor of the P and Mate headliners. But when the cogs of the well-oiled PR machine no longer need to spin for the big guns, they are put to good use in the marketing of the Lite model, previously mentioned just briefly by the maker.The Huawei P30 Lite has the captivating looks of the more expensive P30 models with all the bells and whistles - curves, glossy frame, gradient back. And speaking of the back, there is a triple-camera on the back as well, though not as advanced as on the regular P30 - it can snap regular and ultra-wide photos and Night Mode is available, but optical zoom is missing.',
            'category_id' => $category3->id,
            'image' => 'posts/p30pro.jpg',
            'user_id' => $author1->id
        ]);
        $post2 = $author2->posts()->create([
            'title' => 'Samsung Galaxy Note 10 Plus Review',
            'description' => 'The ultimate big-screen phone.',
            'content' => 'It hit me during my long commute home while I was catching up on Stranger Things on the 6.8-inch Galaxy Note 10 Plus. As Jane approached Jim Hopper\'s house with its fiery orange lights illuminating his silhouette, I thought to myself: "This is better than my TV."And the back of the Galaxy Note 10 Plus is just as captivating as the front, especially if you opt for the Aura Glow color, which reflects all the colors of the rainbow depending on how the light hits the glass back.',
            'category_id' => $category2->id,
            'image' => 'posts/note10plus.jpg'
        ]);
        $post3 = $author1->posts()->create([
            'title' => 'iPhone 8 Plus review',
            'description' => 'It\'s no iPhone 11 Pro Max, but the 8 Plus is a cheaper, solid pick',
            'content' => 'The iPhone 8 Plus remains a solid option in the iPhone ecosystem, but it has some new competition, so since this review was originally published, we\'ve added comparisons to some of the alternative phones you might be considering. Plus we\'ve now had official word that iOS 13 will be coming to the phone later this year.The newest contenders into this competition congregation are 2019\'s iPhone line. That\'s the iPhone 11, iPhone 11 Pro and iPhone 11 Pro Max, and they\'re far more powerful than 2017\'s iPhone 8 Plus.',
            'category_id' => $category1->id,
            'image' => 'posts/iphone8plus.jpg'
        ]);
        $post4 = $author2->posts()->create([
            'title' => 'iPhone X Review',
            'description' => 'The iPhone X has since been superseded by the iPhone XS, but while stocks last it\'s still a pretty compelling device.',
            'content' => 'Apple has been coasting for too long with the design it introduced for the iPhone 6, but that all changes with the iPhone X – in a big way. You don’t need me to tell you the iPhone X is a huge departure from the iPhone design of old – just look at the pictures. Not only does it look good, however; Apple has done a fantastic job at actually making it feel really good too.',
            'category_id' => $category1->id,
            'image' => 'posts/iphonex.jpg'
        ]);
        $tag1 = Tag::create([
            'name' => 'red'
        ]);
        $tag2 = Tag::create([
            'name' => 'white'
        ]);
        $tag3 = Tag::create([
            'name' => 'black'
        ]);

        $post1->tags()->attach([$tag2->id]);
        $post2->tags()->attach([$tag3->id]);
        $post3->tags()->attach([$tag1->id]);
        $post4->tags()->attach([$tag3->id]);
    }
}
