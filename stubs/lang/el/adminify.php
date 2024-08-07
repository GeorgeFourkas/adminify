<?php

return [
    /*
     *  Here you can find all the texts that are displayed by the adminify package.
     * Also it includes the texts from the overridden Laravel Breeze Blade view.
     *
     */
    'dashboard' => [
        'cards' => [
            ['title' => 'συνδεδεμένοι χρήστες'],
            ['title' => 'εβδομαδιαίοι επισκέπτες'],
            ['title' => 'μέσος χρόνος συνεδρίας'],
            ['title' => 'συνολικές δημοσιεύσεις'],
        ],

        'hero' => [
            'upper_text' => 'διαχείριση',
            'title' => 'πίνακας διαχείρισης nalcom',
            'description' => 'Όταν υπάρχουν επισκέπτες συνδεδεμένοι στον ιστότοπο, θα εμφανίζεται ένα γράφημα ντόνατ που περιέχει τους τύπους συσκευών',
            'no_data' => 'Δεν υπάρχουν διαθέσιμα δεδομένα αυτή τη στιγμή',
        ],

        'documentation' => [
            'upper_text' => 'Διαχείριση ιστοσελίδας με άνεση',
            'description' => 'Έχετε ερωτήσεις σχετικά με τη χρήση του πίνακα διαχείρισης;',
            'link' => 'Διαβάστε τον οδηγό γρήγορης εκκίνησης',
        ],

        'charts' => [
            ['title' => 'πηγές επισκεπτών ιστοτόπου'],
            ['title' => 'επισκόπηση κίνησης'],
            ['title' => 'προβολές σελίδας σε 2 μήνες'],
            ['title' => 'επισκέπτες ανά χώρα'],
        ],
    ],
    'categories' => [
        'page_title' => 'κατηγορίες',
        'add_category_button' => 'προσθήκη κατηγορίας',
        'category_title_input' => 'όνομα',
        'category_parent_id' => 'γονική κατηγορία',
    ],
    'media' => [
        'page_title' => 'Πολυμέσα',
        'upload_action' => 'Μεταφόρτωση πολυμέσων',
        'action_button' => 'Μεταφόρτωση',
        'no_media_available' => 'Δεν υπάρχουν πολυμέσα αυτή τη στιγμή',
        'uploaded_by' => 'ανέβηκε από',
        'uploaded_at' => 'ανέβηκε στις',
        'original_file_name' => 'αρχικό όνομα αρχείου',
        'file_extension' => 'κατάληξη αρχείου',
        'file_size' => 'μέγεθος αρχείου',
        'aspect_ratio' => 'αναλογία διαστάσεων',
        'width' => 'πλάτος',
        'height' => 'ύψος',
        'file_url' => 'url αρχείου',
        'remove_btn' => 'αφαίρεση',
        'chooser' => 'επιλογή πολυμέσων',
    ],
    'settings' => [
        'page_title' => 'ρυθμίσεις ιστοσελίδας',
        'page_description' => 'Εδώ μπορείτε να διαχειριστείτε τις ρυθμίσεις του ιστότοπου σας',
        'features_title' => 'Χαρακτηριστικά ιστοσελίδας',
        'features_description' => 'Ενεργοποιήστε ή απενεργοποιήστε συγκεκριμένα χαρακτηριστικά του ιστοτόπου, όπως Σχόλια και εγγραφή χρηστών',
        'registration' => 'εγγραφή χρήστη',
        'registration_description' => 'Να επιτρέπεται στους επισκέπτες του ιστοτόπου να εγγραφούν σε αυτόν τον ιστότοπο;',
        'enable_comments' => 'ενεργοποίηση σχολίων στις δημοσιεύσεις',
        'enable_comments_description' => 'Να επιτρέπεται στους επισκέπτες του ιστοτόπου να αφήνουν σχόλια στις δημοσιεύσεις σας',
        'enable_user_comments' => 'Ενεργοποίηση σχολίων από μη εγγεγραμμένους χρήστες',
        'enable_user_comments_description' => 'Να επιτρέπεται σε χρήστες που δεν έχουν πιστοποιηθεί ή ακόμη και εγγεγραμμένοι να προσθέτουν σχόλια στις δημοσιεύσεις σας',
        'localization' => 'Μεταφράσεις',
        'localization_description' => 'Προσθέστε ή αφαιρέστε μεταφράσεις στον ιστότοπό σας, συμπεριλαμβανομένων των δημοσιεύσεών.',
        'default_language' => 'Προεπιλεγμένη γλώσσα',
        'make_default_lang_text' => 'Ορίστε την προεπιλεγμένη γλώσσα',
        'add_language_text' => 'προσθήκη μετάφρασης',
        'json_file_upload' => 'JSON αρχείο διαπιστευτηρίων Google Analytics API',
        'json_file_upload_description' => 'Αυτό το αρχείο JSON περιέχει τα διαπιστευτήρια πιστοποίησης για την πρόσβαση στο Google Analytics API.',
        'json_file_upload_btn' => 'μεταφόρτωση',
        'json_warning_text' => 'Ο ιστότοπός σας έχει ήδη ένα καταχωρημένο αρχείο διαπιστευτηρίων',
        'roles_permissions' => 'ρόλοι & δικαιώματα',
        'roles_permissions_description' => 'Διαχειριστείτε ποιο δικαίωμα έχει κάθε ρόλος χρήστη στον ιστότοπο',
        'progress' => 'Περιμένετε! Αυτό μπορεί να πάρει κάποιο χρόνο',
        'lang_status' => 'κατάσταση γλώσσας',
        'publish_lang' => 'δημοσίευση γλώσσας;',
        'set_default_lang' => 'ορίστε προεπιλεγμένη γλώσσα',
        'locale_change' => 'Οι ρυθμίσεις μεταφράσεων άλλαξαν επιτυχώς',
        'manage_translations' => 'Διαχείριση Μεταφράσεων',
    ],
    'tags' => [
        'page_title' => 'ετικέτες',
        'action_button_text' => 'δημιουργία ετικέτας',
        'name_column' => 'όνομα',
        'created_at_column' => 'δημιουργήθηκε την',
        'create_tag_modal_title' => 'Δημιουργία Ετικέτας',
        'edit_tag_modal_title' => 'Επεξεργασία Ετικέτας',
        'tag_name_field' => 'όνομα ετικέτας',
    ],
    'comments' => [
        'page_title' => 'σχόλια',
        'comment_column' => 'σχόλιο',
        'author_column' => 'συγγραφέας',
        'post_column' => 'δημοσίευση',
        'approved_column' => 'εγκεκριμένο',
        'uploaded_column' => 'δημιουργήθηκε την',
    ],
    'users' => [
        'page_title' => 'χρήστες',
        'action_button' => 'δημιουργία χρήστη',
        'email' => 'Email',
        'password' => 'κωδικός πρόσβασης',
        'password_confirmation' => 'επιβεβαίωση κωδικού πρόσβασης',
        'user_profile_photo' => 'Φωτογραφία Προφίλ Χρήστη',
        'name' => 'όνομα',
        'role' => 'ρόλος',
        'new_password' => 'νέος κωδικός',
        'registered_at' => 'εγγεγραμμένος από',
        'update_password' => 'ενημέρωση κωδικού',
    ],
    'menu' => [
        'dashboard' => 'Αρχική',
        'posts' => 'άρθρα',
        'users' => 'χρήστες',
        'comments' => 'σχόλια',
        'media' => 'πολυμέσα',
        'tags' => 'ετικέτες',
        'categories' => 'κατηγορίες',
        'settings' => 'ρυθμίσεις',
        'separator_1' => 'ταξινόμηση',
        'separator_2' => 'ρυθμίσεις ιστοσελίδας',
    ],
    'registration' => [
        'title' => 'Δημιουργία Νέου Λογαριασμού',
        'subtitle' => 'Συμπληρώστε τα απαραίτητα στοιχεία για να δημιουργήσετε τον λογαριασμό σας',
        'fields' => [
            'full_name' => 'πλήρες όνομα',
            'email' => 'email',
            'password' => 'κωδικός πρόσβασης',
            'password_confirmation' => 'επιβεβαίωση κωδικού πρόσβασης',
            'already_registered' => 'ήδη εγγεγραμμένος;',
        ],
    ],
    'forgot_pwd' => [
        'title' => 'Ξεχάσατε τον κωδικό σας;',
        'subtitle' => 'Μην ανησυχείτε. Θα σας στείλουμε οδηγίες επαναφοράς.',
        'email' => 'Email',
        'send' => 'αποστολή συνδέσμου επαναφοράς',
    ],
    'reset_pwd' => [
        'title' => 'επαναφορά του κωδικού σας',
        'subtitle' => 'Συμπληρώστε τη φόρμα για να επαναφέρετε τον κωδικό σας.',
        'new_password' => 'νέος κωδικός',
        'confirm_new_password' => 'επιβεβαίωση νέου κωδικού',
        'success' => 'Ένας νέος σύνδεσμος επαλήθευσης έχει αποσταλεί στη διεύθυνση ηλεκτρονικού ταχυδρομείου που δηλώσατε κατά την εγγραφή σας.',
    ],
    'email_verification' => [
        'title' => 'προσοχή!',
        'description' => 'Ευχαριστούμε για την εγγραφή! Πριν ξεκινήσετε, θα μπορούσατε να επιβεβαιώσετε τη διεύθυνση email σας πατώντας στον σύνδεσμο που σας στείλαμε μόλις τώρα; Εάν δεν λάβατε το email, με χαρά θα σας στείλουμε άλλο ένα.',
        'success' => 'Ένας νέος σύνδεσμος επαλήθευσης έχει αποσταλεί στη διεύθυνση ηλεκτρονικού ταχυδρομείου που δηλώσατε κατά την εγγραφή σας.',
        'button' => 'επαναποστολή συνδέσμου επαλήθευσης',
        'logout' => 'αποσύνδεση',
    ],
    'errors' => [
        'category_same_as_parent' => 'Η γονική κατηγορία δεν μπορεί να είναι η ίδια η κατηγορία',
        'category_name_required' => "Category's name in main locale is required",

    ],
    'create_post' => 'δημιουργία άρθρου',
    'post_title' => 'τίτλος',
    'post_created_at' => 'ημερομηνία δημιουργίας',
    'post_create_new_category' => 'δημιουργία νέας κατηγορίας',
    'post_author' => 'συγγραφέας',
    'post_status' => 'κατάσταση',
    'post_body' => 'κείμενο άρθρου',
    'post_featured_image' => 'εικόνα προεπισκόπισης',
    'post_meta_tag_name' => 'Όνομα Meta Tag',
    'post_meta_tag_value' => 'Τιμή Meta Tag',
    'post_add_meta_action_button_text' => 'Προσθήκη Πεδίου',
    'create_new_category_trigger' => 'ή, δημιουργήστε νέα κατηγορία',
    'create_new_category_modal' => 'δημιουργία νέας κατηγορίας',
    'deletion_confirmation' => 'Επιβεβαίωση Διαγραφής',
    'are_you_sure' => 'Είστε σίγουροι ότι θέλετε να διαγράψετε αυτήν την εγγραφή;',
    'action_warning' => 'Η ενέργεια δεν μπορεί να ανακληθεί, η διαγραφή θα είναι μόνιμη',
    'affirmative' => 'Ναι, είμαι σίγουρος',
    'negative' => 'Όχι, ακύρωση',
    'published' => 'δημοσιευμένο',
    'publish' => 'δημοσίευση',
    'default' => 'προεπιλεγμένο',
    'submit' => 'καταχώριση',
    'warning' => 'προειδοποίηση',
    'update' => 'ενημέρωση',
    'unpublished' => 'μη δημοσιευμένο',
    'approved' => 'εγκεκριμένο',
    'comment' => 'σχόλιο',
    'welcome_back' => 'καλώς ήρθατε',
    'login_description' => 'Εισαγάγετε το email και τον κωδικό πρόσβασής σας για να συνδεθείτε',
    'remember' => 'να με θυμάσαι',
    'lost_password' => 'ξεχάσατε τον κωδικό σας;',
    'no_account' => 'Δεν έχετε λογαριασμό; Εγγραφείτε',
    'login' => 'σύνδεση',
    'not_translated' => 'μετάφραση δεν έχει οριστεί',
    'category_update' => 'Η κατηγορία ενημερώθηκε επιτυχώς',
    'category_create' => 'Η κατηγορία δημιουργήθηκε επιτυχώς',
    'category_delete' => 'Η κατηγορία διαγράφηκε επιτυχώς',
    'comment_update' => 'το σχόλιο διαγράφηκε επιτυχώς',
    'media_upload' => 'Το πολυμέσο ανέβηκε επιτυχώς',
    'media_delete' => 'Το πολυμέσο διαγράφηκε επιτυχώς',
    'post_create' => 'Το Άρθρο δημιουργήθηκε επιτυχώς',
    'post_update' => 'Το Άρθρο ενημερώθηκε επιτυχώς',
    'post_delete' => 'Το Άρθρο διαγράφηκε επιτυχώς',
    'permissions_alter' => 'Οι αλλαγές στις άδειες αποθηκεύτηκαν επιτυχώς',
    'analytics_json_success' => 'Το αρχείο αποθηκεύτηκε επιτυχώς. Ενημερώστε το αρχείο .env για να ισχύσει η αλλαγή.',
    'settings_sync' => 'Οι ρυθμίσεις συγχρονίστηκαν επιτυχώς',
    'language_added' => 'Προστέθηκε επιτυχώς στη λίστα μεταφράσεων',
    'locale_changed' => 'Η προεπιλεγμένη γλώσσα άλλαξε επιτυχώς',
    'language_removed' => 'αφαιρέθηκε επιτυχώς από τη λίστα μεταφράσεων',
    'tag_create' => 'Η ετικέτα δημιουργήθηκε επιτυχώς',
    'tag_update' => 'Η ετικέτα ενημερώθηκε επιτυχώς',
    'tag_delete' => 'Η ετικέτα διαγράφηκε επιτυχώς',
    'user_create' => 'Ο χρήστης δημιουργήθηκε επιτυχώς',
    'user_password_update' => 'Ο κωδικός πρόσβασης του χρήστη ενημερώθηκε επιτυχώς',
    'user_update' => 'Ο χρήστης ενημερώθηκε επιτυχώς',
    'user_delete' => 'Ο χρήστης διαγράφηκε επιτυχώς',
    'translations_stored' => 'Οι μεταφράσεις αποθηκεύτηκαν επιτυχώς',
    'to' => 'έως',
    'choose_already_uploaded' => 'Επιλέξτε ένα ήδη ανεβασμένο αρχείο',
    'logout' => 'αποσύνδεση',
    'fallback_label' => 'Δευτερεύουσα',
    'fallback' => 'Δευτερεύουσα Γλώσσα',
    'fallback_action' => 'Ορισμός ως Δευτερεύουσας Γλώσσας',
];
