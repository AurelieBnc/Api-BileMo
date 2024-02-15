<?php

namespace App\DataFixtures;

class Fixtures
{
    /**
     * @return array<array<string,string>>
     */
    public function phoneList():array
    {        
        // Définition du tableau phoneList
        $phoneList = array(
            0 => array("modèle" => "iPhone 13 Pro Max", "marque" => "Apple", "OS" => "iOS", "couleur" => "Graphite", "couleurs_supplémentaires" => array("Silver", "Gold")),
            1 => array("modèle" => "Samsung Galaxy S21 Ultra", "marque" => "Samsung", "OS" => "Android", "couleur" => "Phantom Black", "couleurs_supplémentaires" => array("Phantom Silver", "Phantom Navy")),
            2 => array("modèle" => "Google Pixel 6 Pro", "marque" => "Google", "OS" => "Android", "couleur" => "Stormy Black", "couleurs_supplémentaires" => array("Cloudy White", "Midnight Blue")),
            3 => array("modèle" => "OnePlus 9 Pro", "marque" => "OnePlus", "OS" => "Android", "couleur" => "Morning Mist", "couleurs_supplémentaires" => array("Stellar Black", "Arctic Sky")),
            4 => array("modèle" => "Xiaomi Mi 11 Ultra", "marque" => "Xiaomi", "OS" => "Android", "couleur" => "Ceramic White", "couleurs_supplémentaires" => array("Ceramic Black", "Marble Blue")),
            5 => array("modèle" => "Sony Xperia 1 III", "marque" => "Sony", "OS" => "Android", "couleur" => "Frosted Purple", "couleurs_supplémentaires" => array("Frosted Black", "Frosted Gray")),
            6 => array("modèle" => "Huawei P50 Pro", "marque" => "Huawei", "OS" => "Android", "couleur" => "Golden Black", "couleurs_supplémentaires" => array("Golden White", "Golden Blue")),
            7 => array("modèle" => "Motorola Edge Plus", "marque" => "Motorola", "OS" => "Android", "couleur" => "Thunder Grey", "couleurs_supplémentaires" => array("Midnight Black", "Ocean Blue")),
            8 => array("modèle" => "LG Wing", "marque" => "LG", "OS" => "Android", "couleur" => "Aurora Gray", "couleurs_supplémentaires" => array("Aurora Silver", "Aurora Green")),
            9 => array("modèle" => "ASUS ROG Phone 5", "marque" => "ASUS", "OS" => "Android", "couleur" => "Phantom Black", "couleurs_supplémentaires" => array("Phantom White", "Phantom Red")),
            10 => array("modèle" => "Nokia 9 PureView", "marque" => "Nokia", "OS" => "Android", "couleur" => "Midnight Blue", "couleurs_supplémentaires" => array("Polar Night", "Dusk")),
            11 => array("modèle" => "BlackBerry Key2", "marque" => "BlackBerry", "OS" => "Android", "couleur" => "Black", "couleurs_supplémentaires" => array("Silver", "Red")),
            12 => array("modèle" => "Oppo Find X3 Pro", "marque" => "Oppo", "OS" => "Android", "couleur" => "Gloss Black", "couleurs_supplémentaires" => array("Gloss Blue", "Gloss White")),
            13 => array("modèle" => "Realme GT 2 Pro", "marque" => "Realme", "OS" => "Android", "couleur" => "Titanium Black", "couleurs_supplémentaires" => array("Titanium Silver", "Titanium Blue")),
            14 => array("modèle" => "Vivo X70 Pro Plus", "marque" => "Vivo", "OS" => "Android", "couleur" => "Alpha Grey", "couleurs_supplémentaires" => array("Alpha Blue", "Alpha Red")),
            15 => array("modèle" => "Lenovo Legion Phone Duel 2", "marque" => "Lenovo", "OS" => "Android", "couleur" => "Ultimate Black", "couleurs_supplémentaires" => array("Ultimate White", "Ultimate Red")),
            16 => array("modèle" => "ZTE Axon 30 Ultra", "marque" => "ZTE", "OS" => "Android", "couleur" => "Black", "couleurs_supplémentaires" => array("Silver", "Blue")),
            17 => array("modèle" => "TCL 20 Pro 5G", "marque" => "TCL", "OS" => "Android", "couleur" => "Marine Blue", "couleurs_supplémentaires" => array("Twilight Blue", "Mist Green")),
            18 => array("modèle" => "Poco F3", "marque" => "Poco", "OS" => "Android", "couleur" => "Arctic White", "couleurs_supplémentaires" => array("Arctic Blue", "Arctic Black")),
            19 => array("modèle" => "Honor 50", "marque" => "Honor", "OS" => "Android", "couleur" => "Midnight Black", "couleurs_supplémentaires" => array("Phantom Blue", "Phantom Silver")),
            20 => array("modèle" => "iPhone 14 Pro", "marque" => "Apple", "OS" => "iOS", "couleur" => "Silver", "couleurs_supplémentaires" => array("Gold", "Graphite")),
            21 => array("modèle" => "Samsung Galaxy S22 Ultra", "marque" => "Samsung", "OS" => "Android", "couleur" => "Phantom Black", "couleurs_supplémentaires" => array("Phantom Green", "Phantom Silver")),
            22 => array("modèle" => "Google Pixel 7 Pro", "marque" => "Google", "OS" => "Android", "couleur" => "Stormy Black", "couleurs_supplémentaires" => array("Cloudy White", "Midnight Blue")),
            23 => array("modèle" => "OnePlus 10 Pro", "marque" => "OnePlus", "OS" => "Android", "couleur" => "Morning Mist", "couleurs_supplémentaires" => array("Stellar Black", "Arctic Sky")),
            24 => array("modèle" => "Xiaomi Mi 12 Ultra", "marque" => "Xiaomi", "OS" => "Android", "couleur" => "Ceramic White", "couleurs_supplémentaires" => array("Ceramic Black", "Marble Blue")),
            25 => array("modèle" => "Sony Xperia 2", "marque" => "Sony", "OS" => "Android", "couleur" => "Frosted Purple", "couleurs_supplémentaires" => array("Frosted Black", "Frosted Gray")),
            26 => array("modèle" => "Huawei P60 Pro", "marque" => "Huawei", "OS" => "Android", "couleur" => "Golden Black", "couleurs_supplémentaires" => array("Golden White", "Golden Blue")),
            27 => array("modèle" => "Motorola Edge 3", "marque" => "Motorola", "OS" => "Android", "couleur" => "Thunder Grey", "couleurs_supplémentaires" => array("Midnight Black", "Ocean Blue")),
            28 => array("modèle" => "LG Rollable", "marque" => "LG", "OS" => "Android", "couleur" => "Aurora Gray", "couleurs_supplémentaires" => array("Aurora Silver", "Aurora Green")),
            29 => array("modèle" => "ASUS Zenfone 9", "marque" => "ASUS", "OS" => "Android", "couleur" => "Phantom Black", "couleurs_supplémentaires" => array("Phantom White", "Phantom Red")),
            30 => array("modèle" => "Nokia 10 PureView", "marque" => "Nokia", "OS" => "Android", "couleur" => "Midnight Blue", "couleurs_supplémentaires" => array("Polar Night", "Dusk")),
            31 => array("modèle" => "BlackBerry Key3", "marque" => "BlackBerry", "OS" => "Android", "couleur" => "Black", "couleurs_supplémentaires" => array("Silver", "Red")),
            32 => array("modèle" => "Oppo Find X4 Pro", "marque" => "Oppo", "OS" => "Android", "couleur" => "Gloss Black", "couleurs_supplémentaires" => array("Gloss Blue", "Gloss White")),
            33 => array("modèle" => "Realme GT 3 Pro", "marque" => "Realme", "OS" => "Android", "couleur" => "Titanium Black", "couleurs_supplémentaires" => array("Titanium Silver", "Titanium Blue")),
            34 => array("modèle" => "Vivo X80 Pro Plus", "marque" => "Vivo", "OS" => "Android", "couleur" => "Alpha Grey", "couleurs_supplémentaires" => array("Alpha Blue", "Alpha Red")),
            35 => array("modèle" => "Lenovo Legion Phone 3", "marque" => "Lenovo", "OS" => "Android", "couleur" => "Ultimate Black", "couleurs_supplémentaires" => array("Ultimate White", "Ultimate Red")),
            36 => array("modèle" => "ZTE Axon 40 Ultra", "marque" => "ZTE", "OS" => "Android", "couleur" => "Black", "couleurs_supplémentaires" => array("Silver", "Blue")),
            37 => array("modèle" => "TCL 30 Pro 5G", "marque" => "TCL", "OS" => "Android", "couleur" => "Marine Blue", "couleurs_supplémentaires" => array("Twilight Blue", "Mist Green")),
            38 => array("modèle" => "Poco F4", "marque" => "Poco", "OS" => "Android", "couleur" => "Arctic White", "couleurs_supplémentaires" => array("Arctic Blue", "Arctic Black")),
            39 => array("modèle" => "Honor 60", "marque" => "Honor", "OS" => "Android", "couleur" => "Midnight Black", "couleurs_supplémentaires" => array("Phantom Blue", "Phantom Silver"))
        );

        return $phoneList;
    }

    public function userListForFirstClient():array
    {
        $customerList = array(
            0 => array("firstName" => "Mohammed", "lastName" => "Abdelaziz", "email" => "mohammed.abdelaziz@example.com"),
            1 => array("firstName" => "Wei", "lastName" => "Chen", "email" => "wei.chen@example.com"),
            2 => array("firstName" => "Juan", "lastName" => "García", "email" => "juan.garcia@example.com"),
            3 => array("firstName" => "Aarav", "lastName" => "Patel", "email" => "aarav.patel@example.com"),
            4 => array("firstName" => "Jung", "lastName" => "Kim", "email" => "jung.kim@example.com"),
            5 => array("firstName" => "Maria", "lastName" => "González", "email" => "maria.gonzalez@example.com"),
            6 => array("firstName" => "Ahmed", "lastName" => "Mohamed", "email" => "ahmed.mohamed@example.com"),
            7 => array("firstName" => "Youssef", "lastName" => "Ali", "email" => "youssef.ali@example.com"),
            8 => array("firstName" => "Sara", "lastName" => "Silva", "email" => "sara.silva@example.com"),
            9 => array("firstName" => "Ravi", "lastName" => "Kumar", "email" => "ravi.kumar@example.com"),
            10 => array("firstName" => "Linh", "lastName" => "Nguyen", "email" => "linh.nguyen@example.com"),
            11 => array("firstName" => "Lucas", "lastName" => "Santos", "email" => "lucas.santos@example.com"),
            12 => array("firstName" => "Takumi", "lastName" => "Suzuki", "email" => "takumi.suzuki@example.com"),
            13 => array("firstName" => "Ananya", "lastName" => "Sharma", "email" => "ananya.sharma@example.com"),
            14 => array("firstName" => "Fatima", "lastName" => "Alves", "email" => "fatima.alves@example.com"),
            15 => array("firstName" => "Ali", "lastName" => "Hassan", "email" => "ali.hassan@example.com"),
            16 => array("firstName" => "Nina", "lastName" => "Ivanova", "email" => "nina.ivanova@example.com"),
            17 => array("firstName" => "Javier", "lastName" => "Martinez", "email" => "javier.martinez@example.com"),
            18 => array("firstName" => "Gupta", "lastName" => "Khan", "email" => "gupta.khan@example.com"),
            19 => array("firstName" => "Chinatsu", "lastName" => "Yamamoto", "email" => "chinatsu.yamamoto@example.com"),
            20 => array("firstName" => "Lila", "lastName" => "Acharya", "email" => "lila.acharya@example.com"),
            21 => array("firstName" => "Tariq", "lastName" => "Hasan", "email" => "tariq.hasan@example.com"),
            22 => array("firstName" => "Dmitri", "lastName" => "Ivanov", "email" => "dmitri.ivanov@example.com"),
            23 => array("firstName" => "Anna", "lastName" => "Novak", "email" => "anna.novak@example.com"),
            24 => array("firstName" => "Yuki", "lastName" => "Tanaka", "email" => "yuki.tanaka@example.com"),
            25 => array("firstName" => "Leila", "lastName" => "Ahmed", "email" => "leila.ahmed@example.com"),
            26 => array("firstName" => "Santiago", "lastName" => "Rodríguez", "email" => "santiago.rodriguez@example.com"),
            27 => array("firstName" => "Davide", "lastName" => "Rossi", "email" => "davide.rossi@example.com"),
            28 => array("firstName" => "Jasmine", "lastName" => "Li", "email" => "jasmine.li@example.com"),
            29 => array("firstName" => "Nadia", "lastName" => "Ibrahim", "email" => "nadia.ibrahim@example.com"),
            30 => array("firstName" => "Mikhail", "lastName" => "Sidorov", "email" => "mikhail.sidorov@example.com"),
            31 => array("firstName" => "Hiroshi", "lastName" => "Sato", "email" => "hiroshi.sato@example.com"),
            32 => array("firstName" => "Elena", "lastName" => "Kuznetsova", "email" => "elena.kuznetsova@example.com"),
            33 => array("firstName" => "Andrea", "lastName" => "Bianchi", "email" => "andrea.bianchi@example.com"),
            34 => array("firstName" => "Rosa", "lastName" => "Garcia", "email" => "rosa.garcia@example.com"),
            35 => array("firstName" => "Eduardo", "lastName" => "Martinez", "email" => "eduardo.martinez@example.com"),
            36 => array("firstName" => "Johanna", "lastName" => "Müller", "email" => "johanna.muller@example.com"),
            37 => array("firstName" => "Aya", "lastName" => "Takahashi", "email" => "aya.takahashi@example.com"),
            38 => array("firstName" => "Tomas", "lastName" => "Novák", "email" => "tomas.novak@example.com"),
            39 => array("firstName" => "Sofia", "lastName" => "Andersen", "email" => "sofia.andersen@example.com"),
            40 => array("firstName" => "Mohammad", "lastName" => "Al-Rashid", "email" => "mohammad.alrashid@example.com"),
            41 => array("firstName" => "Youssef", "lastName" => "El-Amir", "email" => "youssef.elamir@example.com"),
            42 => array("firstName" => "Omar", "lastName" => "Suleiman", "email" => "omar.suleiman@example.com"),
            43 => array("firstName" => "Amira", "lastName" => "Mahmoud", "email" => "amira.mahmoud@example.com"),
            44 => array("firstName" => "Boris", "lastName" => "Ivanovich", "email" => "boris.ivanovich@example.com"),
            45 => array("firstName" => "Daria", "lastName" => "Petrova", "email" => "daria.petrova@example.com"),
            46 => array("firstName" => "Pedro", "lastName" => "Fernandez", "email" => "pedro.fernandez@example.com"),
            47 => array("firstName" => "Yusuf", "lastName" => "Öztürk", "email" => "yusuf.ozturk@example.com"),
            48 => array("firstName" => "Marta", "lastName" => "Gomez", "email" => "marta.gomez@example.com"),
            49 => array("firstName" => "Sergei", "lastName" => "Pavlov", "email" => "sergei.pavlov@example.com"),
        );

        return $customerList;
    }

    public function userListForSecondClient():array
    {
        // Définition du tableau customerList
        $customerList = array(
            0 => array("firstName" => "Hiroshi", "lastName" => "Yamamoto", "email" => "hiroshi.yamamoto@example.com"),
            1 => array("firstName" => "Anastasia", "lastName" => "Ivanova", "email" => "anastasia.ivanova@example.com"),
            2 => array("firstName" => "Elena", "lastName" => "Popescu", "email" => "elena.popescu@example.com"),
            3 => array("firstName" => "Khaled", "lastName" => "Abdullah", "email" => "khaled.abdullah@example.com"),
            4 => array("firstName" => "Luis", "lastName" => "González", "email" => "luis.gonzalez@example.com"),
            5 => array("firstName" => "Marta", "lastName" => "Martinez", "email" => "marta.martinez@example.com"),
            6 => array("firstName" => "Giorgio", "lastName" => "Ricci", "email" => "giorgio.ricci@example.com"),
            7 => array("firstName" => "Katja", "lastName" => "Schmidt", "email" => "katja.schmidt@example.com"),
            8 => array("firstName" => "Viktor", "lastName" => "Novak", "email" => "viktor.novak@example.com"),
            9 => array("firstName" => "Ranjit", "lastName" => "Patel", "email" => "ranjit.patel@example.com"),
            10 => array("firstName" => "Cristina", "lastName" => "Lopez", "email" => "cristina.lopez@example.com"),
            11 => array("firstName" => "Abdul", "lastName" => "Rahman", "email" => "abdul.rahman@example.com"),
            12 => array("firstName" => "Nadia", "lastName" => "Ahmed", "email" => "nadia.ahmed@example.com"),
            13 => array("firstName" => "Andreas", "lastName" => "Müller", "email" => "andreas.muller@example.com"),
            14 => array("firstName" => "Sophie", "lastName" => "Lefèvre", "email" => "sophie.lefevre@example.com"),
            15 => array("firstName" => "Yusuke", "lastName" => "Tanaka", "email" => "yusuke.tanaka@example.com"),
            16 => array("firstName" => "Elena", "lastName" => "Antonova", "email" => "elena.antonova@example.com"),
            17 => array("firstName" => "Carlos", "lastName" => "Santos", "email" => "carlos.santos@example.com"),
            18 => array("firstName" => "Anastasia", "lastName" => "Petrov", "email" => "anastasia.petrov@example.com"),
            19 => array("firstName" => "Tariq", "lastName" => "Mohammed", "email" => "tariq.mohammed@example.com"),
            20 => array("firstName" => "Anna", "lastName" => "Zimmermann", "email" => "anna.zimmermann@example.com"),
            21 => array("firstName" => "Ryu", "lastName" => "Suzuki", "email" => "ryu.suzuki@example.com"),
            22 => array("firstName" => "Alicia", "lastName" => "Garcia", "email" => "alicia.garcia@example.com"),
            23 => array("firstName" => "Igor", "lastName" => "Smirnov", "email" => "igor.smirnov@example.com"),
            24 => array("firstName" => "Federico", "lastName" => "Romano", "email" => "federico.romano@example.com"),
            25 => array("firstName" => "Shiori", "lastName" => "Fujimoto", "email" => "shiori.fujimoto@example.com"),
            26 => array("firstName" => "Mohammed", "lastName" => "Ali", "email" => "mohammed.ali@example.com"),
            27 => array("firstName" => "Eva", "lastName" => "Andersson", "email" => "eva.andersson@example.com"),
            28 => array("firstName" => "Giovanni", "lastName" => "Rossi", "email" => "giovanni.rossi@example.com"),
            29 => array("firstName" => "Ekaterina", "lastName" => "Ivanova", "email" => "ekaterina.ivanova@example.com"),
            30 => array("firstName" => "Tarek", "lastName" => "Eid", "email" => "tarek.eid@example.com"),
            31 => array("firstName" => "Yui", "lastName" => "Takahashi", "email" => "yui.takahashi@example.com"),
            32 => array("firstName" => "Olga", "lastName" => "Kuznetsova", "email" => "olga.kuznetsova@example.com"),
            33 => array("firstName" => "Liam", "lastName" => "Wilson", "email" => "liam.wilson@example.com"),
            34 => array("firstName" => "Cécile", "lastName" => "Dupont", "email" => "cecile.dupont@example.com"),
            35 => array("firstName" => "Jorge", "lastName" => "Rodriguez", "email" => "jorge.rodriguez@example.com"),
            36 => array("firstName" => "Anna", "lastName" => "Sokolova", "email" => "anna.sokolova@example.com"),
            37 => array("firstName" => "Natalia", "lastName" => "Pavlova", "email" => "natalia.pavlova@example.com"),
            38 => array("firstName" => "Takumi", "lastName" => "Takahashi", "email" => "takumi.takahashi@example.com"),
            39 => array("firstName" => "Luc", "lastName" => "Lefebvre", "email" => "luc.lefebvre@example.com"),
            40 => array("firstName" => "Tara", "lastName" => "Murphy", "email" => "tara.murphy@example.com"),
            41 => array("firstName" => "Andrey", "lastName" => "Ivanov", "email" => "andrey.ivanov@example.com"),
            42 => array("firstName" => "Ahmed", "lastName" => "El-Sayed", "email" => "ahmed.elsayed@example.com"),
            43 => array("firstName" => "Marija", "lastName" => "Jovanovic", "email" => "marija.jovanovic@example.com"),
            44 => array("firstName" => "Ahmed", "lastName" => "Al-Mansoori", "email" => "ahmed.almansoori@example.com"),
            45 => array("firstName" => "Eva", "lastName" => "Larsson", "email" => "eva.larsson@example.com"),
            46 => array("firstName" => "Lev", "lastName" => "Ivanov", "email" => "lev.ivanov@example.com"),
            47 => array("firstName" => "Nina", "lastName" => "Andreeva", "email" => "nina.andreeva@example.com"),
            48 => array("firstName" => "Miguel", "lastName" => "Fernandez", "email" => "miguel.fernandez@example.com"),
            49 => array("firstName" => "Aleksandr", "lastName" => "Smirnov", "email" => "aleksandr.smirnov@example.com"),
        );


        return $customerList;
    }
}