<?php

namespace Nalcom\Adminify\Commands;

use App\Models\Adminify\Category;
use App\Models\Adminify\Media;
use App\Models\Adminify\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SeedStartupDatabaseCommand extends Command
{
    protected $signature = 'adminify:seed-basic';

    protected $description = 'Command description';

    public function handle(): void
    {

        $posts[] = Post::create([
            'en' => [
                'title' => 'Boosting Sales through Effective Blogging: How a Blogging Platform Can Transform Your Business',
                'body' => "<p>In today's digital era, businesses are constantly seeking innovative strategies to drive sales and enhance brand visibility. One powerful tool that has emerged as a game-changer is the use of blogging platforms. Blogging is no longer just an outlet for individuals to express personal thoughts; it has evolved into a crucial component of corporate marketing strategies. In this blog post, we will explore how a blogging platform can significantly impact sales and transform the way businesses connect with their audience.</p> <br><h1>The Power of Content</h1><p>Content is king in the digital marketing world. A blogging platform provides a perfect stage for businesses to showcase their expertise, products, and services through well-crafted content. This content not only informs and engages potential customers but also helps in building trust, which is a critical factor in the sales process.</p><h1>SEO Advantages</h1><p>Blogging platforms are designed with search engine optimization (SEO) in mind. Regularly updated blogs with relevant keywords help businesses rank higher in search engine results, leading to increased visibility. Higher visibility equates to more traffic, and more traffic means a higher potential for sales conversions.</p>"
            ],
            'el' => [
                'title' => 'Αύξηση των Πωλήσεων μέσω Αποτελεσματικού Blogging: Πώς μια Πλατφόρμα Blogging Μπορεί να Μεταμορφώσει την Επιχείρησή σας',
                'body' => "<p>Στη σημερινή ψηφιακή εποχή, οι επιχειρήσεις αναζητούν συνεχώς καινοτόμες στρατηγικές για να οδηγήσουν τις πωλήσεις και να ενισχύσουν την ορατότητα του σήματός τους. Ένα ισχυρό εργαλείο που έχει αναδειχθεί ως σημαντικό στοιχείο στην αγορά είναι η χρήση των πλατφορμών blogging. Το blogging δεν είναι πλέον απλώς ένας τρόπος για τα άτομα να εκφράσουν προσωπικές σκέψεις· έχει εξελιχθεί σε ένα κρίσιμο συστατικό των στρατηγικών εμπορικής διαφήμισης των εταιρειών. Σε αυτή την ανάρτηση ιστολογίου, θα εξετάσουμε πώς μια πλατφόρμα blogging μπορεί να επηρεάσει σημαντικά τις πωλήσεις και να μεταμορφώσει τον τρόπο με τον οποίο οι επιχειρήσεις συνδέονται με το κοινό τους.</p><h1>Η Δύναμη του Περιεχομένου</h1><p>Το περιεχόμενο είναι βασιλιάς στον κόσμο του ψηφιακού μάρκετινγκ. Μια πλατφόρμα blogging παρέχει την τέλεια σκηνή για τις επιχειρήσεις να παρουσιάσουν την εμπειρογνωμοσύνη, τα προϊόντα και τις υπηρεσίες τους μέσω καλά δομημένου περιεχομένου. Αυτό το περιεχόμενο όχι μόνο ενημερώνει και διασκεδάζει τους πιθανούς πελάτες, αλλά βοηθά και στην κατασκ</p>"
            ],
            'user_id' => DB::table('users')->select('id')->limit(1)->first()->id,
            'published' => true
        ]);

        $posts[] = Post::create([
            'en' => [
                'title' => 'The wall Street journal. How can you make money from your sofa!',
                'body' => "<p>In today's digital era, businesses are constantly seeking innovative strategies to drive sales and enhance brand visibility. One powerful tool that has emerged as a game-changer is the use of blogging platforms. Blogging is no longer just an outlet for individuals to express personal thoughts; it has evolved into a crucial component of corporate marketing strategies. In this blog post, we will explore how a blogging platform can significantly impact sales and transform the way businesses connect with their audience.</p> <br><h1>The Power of Content</h1><p>Content is king in the digital marketing world. A blogging platform provides a perfect stage for businesses to showcase their expertise, products, and services through well-crafted content. This content not only informs and engages potential customers but also helps in building trust, which is a critical factor in the sales process.</p><h1>SEO Advantages</h1><p>Blogging platforms are designed with search engine optimization (SEO) in mind. Regularly updated blogs with relevant keywords help businesses rank higher in search engine results, leading to increased visibility. Higher visibility equates to more traffic, and more traffic means a higher potential for sales conversions.</p>"
            ],
            'el' => [
                'title' => 'Αύξηση των Πωλήσεων μέσω Αποτελεσματικού Blogging: Πώς μια Πλατφόρμα Blogging Μπορεί να Μεταμορφώσει την Επιχείρησή σας',
                'body' => "<p>Στη σημερινή ψηφιακή εποχή, οι επιχειρήσεις αναζητούν συνεχώς καινοτόμες στρατηγικές για να οδηγήσουν τις πωλήσεις και να ενισχύσουν την ορατότητα του σήματός τους. Ένα ισχυρό εργαλείο που έχει αναδειχθεί ως σημαντικό στοιχείο στην αγορά είναι η χρήση των πλατφορμών blogging. Το blogging δεν είναι πλέον απλώς ένας τρόπος για τα άτομα να εκφράσουν προσωπικές σκέψεις· έχει εξελιχθεί σε ένα κρίσιμο συστατικό των στρατηγικών εμπορικής διαφήμισης των εταιρειών. Σε αυτή την ανάρτηση ιστολογίου, θα εξετάσουμε πώς μια πλατφόρμα blogging μπορεί να επηρεάσει σημαντικά τις πωλήσεις και να μεταμορφώσει τον τρόπο με τον οποίο οι επιχειρήσεις συνδέονται με το κοινό τους.</p><h1>Η Δύναμη του Περιεχομένου</h1><p>Το περιεχόμενο είναι βασιλιάς στον κόσμο του ψηφιακού μάρκετινγκ. Μια πλατφόρμα blogging παρέχει την τέλεια σκηνή για τις επιχειρήσεις να παρουσιάσουν την εμπειρογνωμοσύνη, τα προϊόντα και τις υπηρεσίες τους μέσω καλά δομημένου περιεχομένου. Αυτό το περιεχόμενο όχι μόνο ενημερώνει και διασκεδάζει τους πιθανούς πελάτες, αλλά βοηθά και στην κατασκ</p>"
            ],
            'user_id' => DB::table('users')->select('id')->limit(1)->first()->id,
            'published' => true
        ]);


        $posts[] = Post::create([
            'en' => [
                'title' => 'Breaking News. Microsoft released a brand new product called Windows Explorer bundled with windows!',
                'body' => "<p>In today's digital era, businesses are constantly seeking innovative strategies to drive sales and enhance brand visibility. One powerful tool that has emerged as a game-changer is the use of blogging platforms. Blogging is no longer just an outlet for individuals to express personal thoughts; it has evolved into a crucial component of corporate marketing strategies. In this blog post, we will explore how a blogging platform can significantly impact sales and transform the way businesses connect with their audience.</p> <br><h1>The Power of Content</h1><p>Content is king in the digital marketing world. A blogging platform provides a perfect stage for businesses to showcase their expertise, products, and services through well-crafted content. This content not only informs and engages potential customers but also helps in building trust, which is a critical factor in the sales process.</p><h1>SEO Advantages</h1><p>Blogging platforms are designed with search engine optimization (SEO) in mind. Regularly updated blogs with relevant keywords help businesses rank higher in search engine results, leading to increased visibility. Higher visibility equates to more traffic, and more traffic means a higher potential for sales conversions.</p>"
            ],
            'el' => [
                'title' => 'Αύξηση των Πωλήσεων μέσω Αποτελεσματικού Blogging: Πώς μια Πλατφόρμα Blogging Μπορεί να Μεταμορφώσει την Επιχείρησή σας',
                'body' => "<p>Στη σημερινή ψηφιακή εποχή, οι επιχειρήσεις αναζητούν συνεχώς καινοτόμες στρατηγικές για να οδηγήσουν τις πωλήσεις και να ενισχύσουν την ορατότητα του σήματός τους. Ένα ισχυρό εργαλείο που έχει αναδειχθεί ως σημαντικό στοιχείο στην αγορά είναι η χρήση των πλατφορμών blogging. Το blogging δεν είναι πλέον απλώς ένας τρόπος για τα άτομα να εκφράσουν προσωπικές σκέψεις· έχει εξελιχθεί σε ένα κρίσιμο συστατικό των στρατηγικών εμπορικής διαφήμισης των εταιρειών. Σε αυτή την ανάρτηση ιστολογίου, θα εξετάσουμε πώς μια πλατφόρμα blogging μπορεί να επηρεάσει σημαντικά τις πωλήσεις και να μεταμορφώσει τον τρόπο με τον οποίο οι επιχειρήσεις συνδέονται με το κοινό τους.</p><h1>Η Δύναμη του Περιεχομένου</h1><p>Το περιεχόμενο είναι βασιλιάς στον κόσμο του ψηφιακού μάρκετινγκ. Μια πλατφόρμα blogging παρέχει την τέλεια σκηνή για τις επιχειρήσεις να παρουσιάσουν την εμπειρογνωμοσύνη, τα προϊόντα και τις υπηρεσίες τους μέσω καλά δομημένου περιεχομένου. Αυτό το περιεχόμενο όχι μόνο ενημερώνει και διασκεδάζει τους πιθανούς πελάτες, αλλά βοηθά και στην κατασκ</p>"
            ],
            'user_id' => DB::table('users')->select('id')->limit(1)->first()->id,
            'published' => true
        ]);


        $media[] = Media::create([
            'url' => 'https://fastly.picsum.photos/id/13/2500/1667.jpg?hmac=SoX9UoHhN8HyklRA4A3vcCWJMVtiBXUg0W4ljWTor7s',
            'size' => '9',
            'extension' => 'unknown'
        ]);
        $media[] = Media::create([
            'url' => 'https://fastly.picsum.photos/id/21/3008/2008.jpg?hmac=T8DSVNvP-QldCew7WD4jj_S3mWwxZPqdF0CNPksSko4',
            'size' => '9',
            'extension' => 'unknown'
        ]);
        $media[] = Media::create([
            'url' => 'https://fastly.picsum.photos/id/29/4000/2670.jpg?hmac=rCbRAl24FzrSzwlR5tL-Aqzyu5tX_PA95VJtnUXegGU',
            'size' => '9',
            'extension' => 'unknown'
        ]);


        $category1 = Category::create([
            'en' => ['name' => 'software'],
            'el' => ['name' => 'Λογισμικό'],
            'parent_id' => null
        ]);

        $category2 = Category::create([
            'en' => ['name' => 'Economics'],
            'el' => ['name' => 'Οικονομικά'],
            'parent_id' => null
        ]);


        $category3 = Category::create([
            'en' => ['name' => 'Web Development'],
            'el' => ['name' => 'Προγραμματισμός Ιστού'],
            'parent_id' => $category1->id
        ]);

        $category4 = Category::create([
            'en' => ['name' => 'Mobile Apps Development'],
            'el' => ['name' => 'Προγραμματισμός εφαρμογών για κινητές συσκευές'],
            'parent_id' => $category1->id
        ]);


        $category5 = Category::create([
            'en' => ['name' => 'Stocks'],
            'el' => ['name' => 'Μετοχές'],
            'parent_id' => $category2->id
        ]);


        $posts[0]->categories()->sync([$category1->id, $category3->id, $category5->id]);
        $posts[1]->categories()->sync([$category2->id, $category4->id, $category1->id]);
        $posts[2]->categories()->sync([$category3->id, $category4->id, $category5->id]);

        $posts[0]->media()->sync($media[0]->id);
        $posts[1]->media()->sync($media[1]->id);
        $posts[2]->media()->sync($media[2]->id);


    }
}




