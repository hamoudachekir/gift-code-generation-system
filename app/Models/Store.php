<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Sushi\Sushi;

class Store extends Model
{
    use HasFactory;
    use Sushi;


    public function getRows()
    {
        return [
            [
                "store_id" => "12",
                "store_slug" => "taraji_privileges",
                "store_name" => "TARAJI Privilèges",
                "store_logo" => "https://storage.SBG.cloud.ovh.net/v1/AUTH_0a22807843ed4e858c9d369099d3d483/bigdeal/uploads/stores/logos/34679228-1612338678.png",
                "store_images" => "xx2We1H8dl6x5x8VNgnS2Rk6tSpugpa82uRRbdEs.png",
                "store_desc" => "  lorem ipsum dolor sit amet consectetuer adipiscing elit ",
                "store_mail" => "taraji@mail.com",
                "store_manager_name" => "Foulen  Foulani",
                "store_mobile" => "22222221",
                "store_login" => "taraji",
                "store_password" => "1234565456456",
                "store_active" => "1",
                "store_featured" => "0",
                "store_website" => "http://clubprivileges.com",
                "store_facebook" => "http://localhost/clubprivileges/public/store/create?return=",
                "store_instagram" => "http://localhost/clubprivileges/public/store/create?return=",
                "store_auth_email" => "taraji@auth.com",
                "store_auth_password" => '$2y$10$UEGiopNNF/ngRc13o/zB5.XjqbePcfNBEbKxP9tzu/UnCrWp7BLpG',
                "store_smt_config" => null,
                "store_sms_config" => "2",
                "allow_subscribe" => "0",
                "created_at" => "2020-12-17 11:06:14",
                "updated_at" => "2022-06-21 16:23:12",
                "entry_by" => null,
                "store_mobile_logo" => null,
                "forced_mobile_logo" => "0"
            ],
            [
                "store_id" => "13",
                "store_slug" => "clubprivileges",
                "store_name" => "Club Privilèges",
                "store_logo" => "https://storage.SBG.cloud.ovh.net/v1/AUTH_0a22807843ed4e858c9d369099d3d483/bigdeal/uploads/stores/logos/32675568-1612338665.jpg",
                "store_images" => "oYnKQeLKnF8vRcWK5nWqMxXtX6GcyfxzXGhkVUpR.jpeg",
                "store_desc" => "   lorem am name alad",
                "store_mail" => "privileges@club.com",
                "store_manager_name" => "Rane Fare",
                "store_mobile" => "50000000",
                "store_login" => "club",
                "store_password" => '$2y$10$ZFfNvtN9/aS5lEzwwM7tGOwNbKA1XjihmszzNEDG2D93OXEjWyMwO',
                "store_active" => "1",
                "store_featured" => "1",
                "store_website" => "http://clubprivileges.com",
                "store_facebook" => "http://facebook.com/clubprivileges",
                "store_instagram" => "http://instagram.com/clubprivileges",
                "store_auth_email" => "club@auth.com",
                "store_auth_password" => '$2y$10$yZY1dhbnTXplcnWKGdp1XeL4iMeMjMDA7S8L0k6c.H44VnxPBsUHy',
                "store_smt_config" => "1",
                "store_sms_config" => null,
                "allow_subscribe" => "0",
                "created_at" => "2020-12-17 13:13:02",
                "updated_at" => "2022-06-21 16:17:28",
                "entry_by" => null,
                "store_mobile_logo" => null,
                "forced_mobile_logo" => "0"
            ],
            [
                "store_id" => "16",
                "store_slug" => "my_ooredoo_privileges",
                "store_name" => "My_Ooredoo_Privileges",
                "store_logo" => "uploads/stores/logos/17114393-1697821928.png",
                "store_images" => "sysnMwGAIkYxJnCvCWh2PItjuCKEgL0Bx4V2V1nA.jpeg,Ke01WBSPep1GxQ16WQeJzANDBAZoEKZQ9T9vohhr.jpeg",
                "store_desc" => "My ooredoo",
                "store_mail" => "slim.naguech@ooredoo.tn",
                "store_manager_name" => "Slim naguech",
                "store_mobile" => "2147483647",
                "store_login" => "My_ooredoo",
                "store_password" => "1234747545255",
                "store_active" => "1",
                "store_featured" => "1",
                "store_website" => "https://www.ooredoo.tn/",
                "store_facebook" => "http://facebook.com/ooredoo",
                "store_instagram" => "http://facebook.com/ooredoo",
                "store_auth_email" => "myooredoo@auth.com",
                "store_auth_password" => '$2y$10$mGaWTIOG7rCKXCX7ijUcm.89yi03wnVSiyJeZwnr4SPX2QCKUYOqC',
                "store_smt_config" => null,
                "store_sms_config" => null,
                "allow_subscribe" => "0",
                "created_at" => "2020-12-21 09:50:39",
                "updated_at" => "2023-12-07 08:16:15",
                "entry_by" => null,
                "store_mobile_logo" => null,
                "forced_mobile_logo" => "0"
            ],
            [
                "store_id" => "18",
                "store_slug" => "ooredoo",
                "store_name" => "Ooredoo Privilège",
                "store_logo" => "uploads/stores/logos/45848054-1704714387.png",
                "store_images" => "uploads/stores/images/73250792-1617111515.png",
                "store_desc" => "",
                "store_mail" => "kamel.moussa@ooredoo.tn",
                "store_manager_name" => "Ooredoo",
                "store_mobile" => "22124456",
                "store_login" => "ooredoo@privilege",
                "store_password" => "ooredoo_privilege",
                "store_active" => "1",
                "store_featured" => "0",
                "store_website" => "https://www.ooredoo.tn/",
                "store_facebook" => "https://www.facebook.com/ooredootn",
                "store_instagram" => "https://www.instagram.com/ooredootn/",
                "store_auth_email" => "ooredoo@clubprivilege.tn",
                "store_auth_password" => '$2y$10$bQrQEgrfVIwk5Rut66aa2uSPMHLY741yRFNiMsYiJqhVowY//Iv2G',
                "store_smt_config" => "1",
                "store_sms_config" => null,
                "allow_subscribe" => "0",
                "created_at" => "2021-03-30 12:38:35",
                "updated_at" => "2024-01-08 11:46:27",
                "entry_by" => null,
                "store_mobile_logo" => "uploads/stores/mobile_logos/30231656-1704046713.png",
                "forced_mobile_logo" => "1"
            ],
            [
                "store_id" => "19",
                "store_slug" => "orange",
                "store_name" => "Orange privilèges",
                "store_logo" => "uploads/stores/logos/85171840-1704048070.png",
                "store_images" => "",
                "store_desc" => "",
                "store_mail" => "anis.abidi@eklectic.tn",
                "store_manager_name" => "Anis abidi",
                "store_mobile" => "98960203",
                "store_login" => "",
                "store_password" => "",
                "store_active" => "1",
                "store_featured" => "0",
                "store_website" => "",
                "store_facebook" => "",
                "store_instagram" => "",
                "store_auth_email" => "",
                "store_auth_password" => "",
                "store_smt_config" => "1",
                "store_sms_config" => null,
                "allow_subscribe" => "1",
                "created_at" => "2021-04-22 14:46:40",
                "updated_at" => "2024-01-03 13:33:42",
                "entry_by" => null,
                "store_mobile_logo" => "uploads/stores/mobile_logos/64094677-1704288822.png",
                "forced_mobile_logo" => "1"
            ],
            [
                "store_id" => "20",
                "store_slug" => "tunisie_telecom",
                "store_name" => "TT privilèges",
                "store_logo" => "uploads/stores/logos/61751070-1619106481.png",
                "store_images" => "",
                "store_desc" => "",
                "store_mail" => "anis.abidi@eklectic.tn",
                "store_manager_name" => "Anis abidi",
                "store_mobile" => "98960203",
                "store_login" => "",
                "store_password" => "",
                "store_active" => "1",
                "store_featured" => "0",
                "store_website" => "",
                "store_facebook" => "",
                "store_instagram" => "",
                "store_auth_email" => "",
                "store_auth_password" => "",
                "store_smt_config" => "1",
                "store_sms_config" => null,
                "allow_subscribe" => "1",
                "created_at" => "2021-04-22 14:48:01",
                "updated_at" => "2024-01-03 14:06:57",
                "entry_by" => null,
                "store_mobile_logo" => "uploads/stores/mobile_logos/23292808-1704290817.png",
                "forced_mobile_logo" => "1"
            ],
            [
                "store_id" => "21",
                "store_slug" => "cgymp",
                "store_name" => "CGYM privileges",
                "store_logo" => "uploads/stores/logos/60469693-1635863063.png",
                "store_images" => "",
                "store_desc" => "",
                "store_mail" => "amine@california-gym.com",
                "store_manager_name" => "Amine mahjoub",
                "store_mobile" => "29",
                "store_login" => "cgymadmin",
                "store_password" => "cgympassword",
                "store_active" => "1",
                "store_featured" => "0",
                "store_website" => "",
                "store_facebook" => "",
                "store_instagram" => "",
                "store_auth_email" => "cgym@clubprivileges.app",
                "store_auth_password" => '$2y$10$feDUZZa4A.JbLz9nOslUAujdGGEI6FOuCu9txEwXVR23TwKROKstS',
                "store_smt_config" => "1",
                "store_sms_config" => "1",
                "allow_subscribe" => "0",
                "created_at" => "2021-11-02 14:24:24",
                "updated_at" => "2022-06-21 16:17:52",
                "entry_by" => null,
                "store_mobile_logo" => null,
                "forced_mobile_logo" => "0"
            ],
            [
                "store_id" => "22",
                "store_slug" => "medianet",
                "store_name" => "Medianet ",
                "store_logo" => "uploads/stores/logos/98764301-1655285034.png",
                "store_images" => "uploads/stores/images/64493246-1655285034.png",
                "store_desc" => "",
                "store_mail" => "hazem.trabelsi@medianet.com.tn",
                "store_manager_name" => "Hazem trabelsi",
                "store_mobile" => "28919040",
                "store_login" => "auth@medianet.com",
                "store_password" => "medianet",
                "store_active" => "1",
                "store_featured" => "0",
                "store_website" => "https://www.medianet.tn/fr/",
                "store_facebook" => "",
                "store_instagram" => "",
                "store_auth_email" => "auth@medianet.com",
                "store_auth_password" => '$2y$10$gwVDmxs4bKPVisU.HQOjn.C6/AwuqywDc4h48mPZetb41UmCynD4K',
                "store_smt_config" => "1",
                "store_sms_config" => null,
                "allow_subscribe" => "0",
                "created_at" => "2022-06-15 08:23:54",
                "updated_at" => "2022-06-15 12:45:46",
                "entry_by" => null,
                "store_mobile_logo" => null,
                "forced_mobile_logo" => "0"
            ],
            [
                "store_id" => "23",
                "store_slug" => "club22",
                "store_name" => "Club22",
                "store_logo" => "uploads/stores/logos/38142898-1704713898.png",
                "store_images" => "uploads/stores/images/67395466-1703672321.jpeg",
                "store_desc" => "",
                "store_mail" => "Hassen.AYEDI@ooredoo.tn",
                "store_manager_name" => "Hassen Ayedi",
                "store_mobile" => "22125818",
                "store_login" => "amical_ooredoo",
                "store_password" => "amical123456",
                "store_active" => "1",
                "store_featured" => "0",
                "store_website" => "",
                "store_facebook" => "",
                "store_instagram" => "",
                "store_auth_email" => "club22@auth.com",
                "store_auth_password" => '$2y$10$L1tU0ePDrYImkAt3SNjk7.sCNVfnGp8VK9Ilx/QJAw1oudad3N1/y',
                "store_smt_config" => "1",
                "store_sms_config" => null,
                "allow_subscribe" => "0",
                "created_at" => "2023-11-20 11:23:13",
                "updated_at" => "2024-01-08 11:38:18",
                "entry_by" => null,
                "store_mobile_logo" => "uploads/stores/mobile_logos/58741197-1704290739.png",
                "forced_mobile_logo" => "1"
            ],
            [
                "store_id" => "24",
                "store_slug" => "club223",
                "store_name" => "Sofrecom",
                "store_logo" => "uploads/stores/logos/41688325-1711141885.png",
                "store_images" => "uploads/stores/images/59957151-1711112159.png",
                "store_desc" => "",
                "store_mail" => "Hassen.AYEDI@ooredoo.tn",
                "store_manager_name" => "Hassen Ayedi",
                "store_mobile" => "22125818",
                "store_login" => "club223",
                "store_password" => "123456789",
                "store_active" => "1",
                "store_featured" => "0",
                "store_website" => "",
                "store_facebook" => "",
                "store_instagram" => "",
                "store_auth_email" => "club223@auth.com",
                "store_auth_password" => '$2y$10$ZQnqul2NGlJyViM.IHZb4ezcYChhhrDxiIbF8YbhHCqsctoOEaVwa',
                "store_smt_config" => "1",
                "store_sms_config" => null,
                "allow_subscribe" => "0",
                "created_at" => "2023-12-21 16:38:46",
                "updated_at" => "2024-03-22 21:11:25",
                "entry_by" => null,
                "store_mobile_logo" => "uploads/stores/mobile_logos/65398872-1711141885.png",
                "forced_mobile_logo" => "1"
            ],
            [
                "store_id" => "25",
                "store_slug" => "onetech2023",
                "store_name" => "One Tech",
                "store_logo" => "uploads/stores/logos/34781194-1703237572.jpg",
                "store_images" => "",
                "store_desc" => "",
                "store_mail" => "resp@oentecht.tn",
                "store_manager_name" => "Onetech responsable",
                "store_mobile" => "20001001",
                "store_login" => "onetech",
                "store_password" => "onetech123",
                "store_active" => "1",
                "store_featured" => "0",
                "store_website" => "onetech.tn",
                "store_facebook" => "",
                "store_instagram" => "",
                "store_auth_email" => "onetech@auth.com",
                "store_auth_password" => '$2y$10$M6EWER1cYfaLwJMmqFB/LuTgG5jT8TU/YALPRbg3fu2vpac2Q6dgi',
                "store_smt_config" => null,
                "store_sms_config" => null,
                "allow_subscribe" => "0",
                "created_at" => "2023-12-22 09:32:53",
                "updated_at" => "2024-01-24 14:17:03",
                "entry_by" => null,
                "store_mobile_logo" => "uploads/stores/mobile_logos/79513468-1704714430.png",
                "forced_mobile_logo" => "1"
            ],
            [
                "store_id" => "26",
                "store_slug" => "tripvalue",
                "store_name" => "Tripvalue",
                "store_logo" => "uploads/stores/logos/94975866-1706105874.jpg",
                "store_images" => "uploads/stores/images/98232845-1706105154.jpeg",
                "store_desc" => "Trip Value",
                "store_mail" => "Medbenyedder@gmail.com",
                "store_manager_name" => "Mohamed Ben Yedder",
                "store_mobile" => "29557957",
                "store_login" => "tripvalue123",
                "store_password" => "tripvalue123",
                "store_active" => "1",
                "store_featured" => "0",
                "store_website" => "",
                "store_facebook" => "",
                "store_instagram" => "",
                "store_auth_email" => "tripvalue@auth.com",
                "store_auth_password" => '$2y$10$bhJYiNPeZxhd/KU6KQAdUupDd3ks2/2FnJt/LPKw.B27NLCy9Mc3e',
                "store_smt_config" => null,
                "store_sms_config" => null,
                "allow_subscribe" => "0",
                "created_at" => "2024-01-04 13:42:38",
                "updated_at" => "2024-01-24 14:17:54",
                "entry_by" => null,
                "store_mobile_logo" => "uploads/stores/mobile_logos/54979508-1706105528.jpeg",
                "forced_mobile_logo" => "1"
            ],
            [
                "store_id" => "27",
                "store_slug" => "indigo223",
                "store_name" => "Indrive",
                "store_logo" => "uploads/stores/logos/77510932-1716478460.png",
                "store_images" => "",
                "store_desc" => "",
                "store_mail" => "Amira@indrive.com",
                "store_manager_name" => "Amira R",
                "store_mobile" => "94219573",
                "store_login" => "indigo223",
                "store_password" => "123456789",
                "store_active" => "1",
                "store_featured" => "0",
                "store_website" => "https://indrive.com/fr",
                "store_facebook" => "",
                "store_instagram" => "",
                "store_auth_email" => "indigo223@auth.com",
                "store_auth_password" => "$2y$10$/XjFrUJwmIsrk1cCysGMXeiWiSg.0eBEFqn/9.ZTjMntvyaRw78Y6",
                "store_smt_config" => "1",
                "store_sms_config" => null,
                "allow_subscribe" => "0",
                "created_at" => "2024-05-23 14:35:13",
                "updated_at" => "2024-05-23 15:34:20",
                "entry_by" => null,
                "store_mobile_logo" => "uploads/stores/mobile_logos/67536286-1716478460.png",
                "forced_mobile_logo" => "1"
            ]
        ];

    }

    protected function sushiShouldCache()
    {
        return true;
    }

}
