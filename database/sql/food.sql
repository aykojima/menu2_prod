INSERT INTO `courses` (`course_id`, `title`, `price`, `created_at`, `updated_at`, `is_omakase`, `list_order`) VALUES
(1,	'Two courses',	NULL,	NULL,	'2018-03-27 14:38:03',	'',	1),
(2,	'Three courses',	39,	'2018-03-24 07:27:21',	'2018-03-27 14:50:43',	'',	2),
(4,	'Six courses',	90,	'2018-03-24 07:47:06',	'2018-03-27 13:58:34',	'',	4),
(36,	'Five courses',	55,	'2018-04-05 10:36:27',	'2018-04-17 08:03:17',	'',	3),
(39,	'Omakase',	NULL,	'2018-04-17 07:36:45',	'2018-05-09 07:39:37',	'Y',	5);


INSERT INTO `c_add_on_items` (`c_add_on_id`, `description`, `price`, `course_id`, `created_at`, `updated_at`) VALUES
(1,	'Served with miso soup',	NULL,	1,	NULL,	'2018-03-27 14:21:39'),
(2,	'Substitute with all sustainable fish/ +3',	NULL,	1,	NULL,	NULL),
(3,	'Add sashimi course',	15,	2,	'2018-03-24 07:32:58',	'2018-04-07 04:52:38'),
(4,	'Add sake pairing',	23,	2,	'2018-03-24 07:35:31',	'2018-04-07 04:52:38'),
(14,	'Add sashimi course',	15,	36,	NULL,	NULL),
(15,	'Add sake pairing',	34,	36,	NULL,	NULL),
(16,	'Add sashimi course',	15,	4,	NULL,	NULL),
(17,	'Add sake pairing',	40,	4,	NULL,	NULL),
(20,	'Featuring lcal and seasonal ingredients in an authentic yet creative Japanese prepatation.',	NULL,	39,	NULL,	NULL);


INSERT INTO `c_items` (`c_item_id`, `name`, `price`, `description`, `choice`, `course_id`, `created_at`, `updated_at`) VALUES
(1,	'Bara Chirashi*',	25,	'sushi rice layered with nori, shrimp oboro, tamago, ginger and topped with a mix of tuna, salmon, yellowtail and ikura',	'N',	1,	NULL,	NULL),
(2,	'Sushi Combo*',	28,	'seven pieces of nigiri sushi and a roll',	'N',	1,	NULL,	NULL),
(3,	'Sashimi Combo*',	30,	'variety of sashimi chosen by the chef served with rice',	'N',	1,	NULL,	NULL),
(4,	'Washington albacore tuna and mustard green*,',	NULL,	NULL,	'Y',	2,	'2018-03-24 08:02:22',	'2018-04-07 04:52:38'),
(5,	'Shigoku oysters on the half shell*, or',	NULL,	NULL,	'N',	2,	'2018-03-24 08:11:37',	'2018-04-07 04:52:38'),
(6,	'String bean salad',	NULL,	NULL,	'N',	2,	'2018-03-24 08:13:56',	'2018-04-07 04:52:38'),
(7,	'Bara chirashi*, or',	NULL,	NULL,	'Y',	2,	'2018-03-24 08:15:07',	'2018-04-07 04:52:38'),
(8,	'Sushi combination*',	NULL,	NULL,	'N',	2,	'2018-03-24 08:15:51',	'2018-04-07 04:52:38'),
(9,	'Chestnut and butter scotch creme brulee, or',	NULL,	NULL,	'Y',	2,	'2018-03-24 08:16:47',	'2018-04-07 04:52:38'),
(11,	'Yuzu and yogurt panna cotta',	NULL,	NULL,	'N',	2,	'2018-03-24 08:17:55',	'2018-04-07 04:52:38'),
(15,	'Washington albacore tuna and mustard green*,',	NULL,	NULL,	'Y',	36,	NULL,	NULL),
(16,	'Shigoku oysters on the half shell*, or',	NULL,	NULL,	'N',	36,	NULL,	NULL),
(17,	'String bean salad',	NULL,	NULL,	'N',	36,	NULL,	NULL),
(18,	'Chawanmushi',	NULL,	NULL,	'N',	36,	NULL,	NULL),
(19,	'Special roll*',	NULL,	NULL,	'N',	36,	NULL,	NULL),
(20,	"Chef\'s selection of 7 pieces of Sushi",	NULL,	NULL,	'N',	36,	NULL,	NULL),
(21,	'Chestnut and butter scotch creme brulee, or',	NULL,	NULL,	'Y',	36,	NULL,	NULL),
(23,	'Yuzu and yogurt panna cotta',	NULL,	NULL,	'N',	36,	NULL,	NULL),
(24,	'Washington albacore tuna and mustard green*,',	NULL,	NULL,	'Y',	4,	NULL,	NULL),
(25,	'Shigoku oysters on the half shell*, or',	NULL,	NULL,	'N',	4,	NULL,	NULL),
(26,	'String bean salad',	NULL,	NULL,	'N',	4,	NULL,	NULL),
(27,	'Chawanmushi',	NULL,	NULL,	'N',	4,	NULL,	NULL),
(28,	'Black cod miso yuan yaki',	NULL,	NULL,	'N',	4,	NULL,	NULL),
(29,	"Chef\'s selection of 5 pieces of Sushi*",	NULL,	NULL,	'N',	4,	NULL,	NULL),
(30,	"Chef\'s selection of 5 pieces of Sushi*",	NULL,	NULL,	'N',	4,	NULL,	NULL),
(31,	'Chestnut and butter scotch creme brulee, or',	NULL,	NULL,	'Y',	4,	NULL,	NULL),
(33,	'Yuzu and yogurt panna cotta',	NULL,	NULL,	'N',	4,	NULL,	NULL),
(37,	'Sashimi Omakase',	NULL,	NULL,	'N',	39,	NULL,	NULL),
(38,	'Sushi Omakase',	NULL,	NULL,	'N',	39,	NULL,	NULL),
(42,	'Seven course Omakase',	110,	'Add sake pairing/ +55',	'N',	39,	NULL,	NULL);



INSERT INTO `ippins` (`ippin_id`, `name`, `price`, `is_sustainable`, `is_raw`, `is_gf`, `category`, `is_special`, `is_on_menu`, `created_at`, `updated_at`) VALUES
(1,	'Mustard greens and Washington albacore tuna dressed with an almond wasabi sauce',	11,	'Y',	'Y',	'Y',	'AP',	'N',	'Y',	NULL,	'2018-10-06 03:46:28'),
(2,	'Kabocha, carrot and yuchoi in a creamy tofu sauce',	9,	'Y',	'Y',	'Y',	'AP',	'N',	'Y',	'2019-05-14 06:24:31',	'2019-05-27 07:20:57'),
(3,	'Local Asparagus and Shimeji Mushrooms sautéed in miso butter',	12,	'N',	'N',	'Y',	'AP',	'N',	'Y',	NULL,	'2019-05-14 13:23:03'),
(4,	'Organic butter lettuce and red lettuce, radishes, toasted almonds and Washington Fuji apples tossed in a sweet miso dressing',	16,	'N',	'N',	'Y',	'AP',	'N',	'Y',	NULL,	'2019-07-02 06:32:16'),
(5,	'String bean salad tossed in a walnut miso dressing',	9,	'N',	'N',	'Y',	'AP',	'N',	'Y',	NULL,	'2018-10-06 10:46:38'),
(6,	'Hijiki seaweed nimono',	9,	'N',	'N',	'Y',	'AP',	'N',	'Y',	NULL,	NULL),
(7,	'Chawan mushi with jidori eggs, snow crab and Neah Bay black cod',	12,	'Y',	'N',	'Y',	'AP',	'N',	'Y',	NULL,	'2018-10-06 10:47:21'),
(8,	'Tempura assortment with wild prawns, local rockfish, kabocha squash, rooftop kale, shiitake mushroom, and satsuma yam',	19,	'Y',	'N',	'N',	'TM',	'N',	'Y',	NULL,	'2019-01-09 08:19:51'),
(9,	'Assorted vegetable tempura with asparagus, kabocha squash, organic shiitake, rooftop kale and satsuma yam served with shiitake mushroom and konbu dashi',	15,	'N',	'N',	'N',	'TM',	'N',	'Y',	NULL,	'2018-10-24 06:49:07'),
(10,	'Ling cod (Neah Bay, WA) Tempura served with matcha sea salt',	16,	'Y',	'N',	'N',	'TM',	'N',	'N',	NULL,	'2018-11-15 08:25:53'),
(11,	'Geoduck (Puget Sound, WA) tender with mustard greens and shimeji mushrooms sauteed in a sake soy butter sauce',	18,	'Y',	'N',	'N',	'FS',	'N',	'Y',	NULL,	'2018-10-07 06:17:38'),
(12,	'Black cod (Neah Bay, WA) miso yuan yaki',	21,	'Y',	'N',	'Y',	'FS',	'N',	'Y',	NULL,	'2018-10-06 03:43:32'),
(13,	'Hamachi (Kagoshima, Japan) kama shioyaki',	NULL,	'N',	'N',	'Y',	'FS',	'N',	'Y',	NULL,	NULL),
(14,	'Kanpachi (Kona, HI) kama shioyaki',	NULL,	'Y',	'N',	'Y',	'FS',	'N',	'Y',	NULL,	NULL),
(15,	'King salmon (Washington) kama shioyaki',	NULL,	'Y',	'N',	'Y',	'FS',	'N',	'Y',	NULL,	'2019-01-26 08:29:53'),
(16,	'White King salmon (AK) kama shioyaki',	NULL,	'Y',	'N',	'Y',	'FS',	'N',	'N',	NULL,	'2019-05-30 06:12:58'),
(17,	'Halibut (Neah Bay, WA) kama nitsuke with hari ginger and fresh gobo',	NULL,	'Y',	'N',	'Y',	'FS',	'N',	'Y',	NULL,	NULL),
(18,	'Idiot fish nitsuke (Washington) with hari ginger and fresh gobo',	NULL,	'Y',	'N',	'Y',	'FS',	'N',	'N',	NULL,	NULL),
(19,	'Madai (Ehime, Japan) aradaki with hari ginger and fresh gobo',	NULL,	'N',	'N',	'Y',	'FS',	'N',	'Y',	NULL,	'2019-03-15 06:12:41'),
(20,	'Braised Snake River Farms wagyu beef skirt konabe with maitake mushrooms and yuchoi',	22,	'N',	'N',	'Y',	'MT',	'N',	'Y',	NULL,	'2018-10-06 03:48:23'),
(21,	'Snake River Farms organic pork tenderloin tonkatsu with sesame tonkatsu sauce',	19,	'N',	'N',	'N',	'MT',	'N',	'Y',	NULL,	'2018-10-02 03:21:02'),
(22,	'Jidori chicken karaage with sansho sea salt',	16,	'N',	'N',	'Y',	'MT',	'N',	'Y',	NULL,	'2018-10-06 03:48:33'),
(23,	'Hiramasa/Kingfish (Australia) kama shioyaki',	NULL,	'Y',	'N',	'Y',	'FS',	'N',	'N',	NULL,	'2019-02-14 08:15:35'),
(24,	'Shumai',	13,	'N',	'N',	'N',	'MT',	'N',	'N',	NULL,	NULL),
(25,	'Shishito peppers blistered and sprinkled with sea salt',	9,	'N',	'N',	'Y',	'AP',	'N',	'Y',	NULL,	NULL),
(26,	'Petrale sole nitsuke (Neah Bay, WA) with hari ginger and fresh gobo',	NULL,	'Y',	'N',	'Y',	'FS',	'N',	'N',	NULL,	'2018-11-14 08:18:57'),
(27,	'Coho salmon (Neah Bay, WA) kama shioyaki',	12,	'Y',	'N',	'Y',	'FS',	'N',	'N',	NULL,	NULL),
(28,	'Lingcod (Neah Bay) Aradaki with hari ginger and fresh gobo',	38,	'Y',	'N',	'Y',	'FS',	'N',	'N',	NULL,	'2019-05-12 06:39:35'),
(29,	'Kinki nitsuke (Neah Bay) with hari ginger and fresh gobo',	NULL,	'Y',	'N',	'Y',	'FS',	'N',	'Y',	NULL,	NULL),
(30,	'Red king salmon kama shioyaki',	NULL,	'Y',	'N',	'Y',	'FS',	'N',	'N',	NULL,	NULL),
(31,	'Spotted parrot fish (Japan) aradaki with hari ginger and fresh gobo',	16,	'Y',	'N',	'Y',	'FS',	'N',	'N',	NULL,	NULL),
(32,	'Grouper (East Coast) aradaki with hari ginger and fresh gobo',	16,	'Y',	'N',	'Y',	'FS',	'N',	'N',	NULL,	NULL),
(33,	'Sakura smoked tofu with scallions, ginger, dark soy sauce and sizzling peanut oil',	12,	'N',	'N',	'N',	'AP',	'N',	'N',	NULL,	NULL),
(34,	'Duck breast sansho yaki served medium rare  with sauteed mustard greens',	21,	'N',	'Y',	'Y',	'MT',	'N',	'N',	NULL,	NULL),
(35,	'Dobin-mushi with Olympic Peninsula Matsutake, Neah Bay black cod, and red crab steamed with clam dashi',	20,	'Y',	'N',	'Y',	'AP',	'N',	'N',	NULL,	NULL),
(36,	'Bering Sea octopus tempura with matcha sea salt',	12,	'Y',	'N',	'N',	'TM',	'N',	'N',	NULL,	NULL),
(37,	'Steamed and chilled monk fish liver in ponzu sauce',	12,	'Y',	'N',	'Y',	'AP',	'N',	'N',	NULL,	NULL),
(38,	'Kinmedai (New Zealand) aradaki with hari ginger and fresh gobo',	NULL,	'Y',	'N',	'Y',	'FS',	'N',	'N',	NULL,	NULL),
(39,	'King Salmon (Alaska) kama shioyaki',	NULL,	'Y',	'N',	'Y',	'FS',	'N',	'N',	NULL,	NULL),
(40,	'Live sea urchin (San Juan Islands, WA) Sashimi',	24,	'Y',	'Y',	'Y',	'FS',	'N',	'N',	NULL,	NULL),
(41,	'Golden eye snapper (Japan) aradaki with hari ginger and fresh gobo',	NULL,	'Y',	'N',	'Y',	'FS',	'N',	'N',	NULL,	NULL),
(42,	'Rockfish (Neah Bay, WA) aradaki with hari ginger and fresh gobo',	15,	'Y',	'N',	'Y',	'FS',	'N',	'N',	NULL,	'2019-05-07 06:12:57'),
(43,	'Tempura with wild white prawns, purple yam, maitake mushroom and shishito pepper with matcha se salt',	20,	'Y',	'N',	'N',	'TM',	'N',	'N',	NULL,	NULL),
(44,	'Cabezone nitsuke with hari ginger and fresh gobo',	NULL,	'Y',	'N',	'Y',	'FS',	'N',	'N',	NULL,	NULL),
(45,	'Cabezone (Neah Bay) tempura served with matcha sea salt',	16,	'Y',	'N',	'N',	'TM',	'N',	'N',	NULL,	NULL),
(46,	'Rockfish (Neah Bay, WA) steamed with fresh ginger, scallions, dark soy sauce and topped with sizzling peanut oil',	19,	'Y',	'N',	'N',	'FS',	'N',	'N',	NULL,	'2019-05-16 06:09:15'),
(47,	'Rock fish (Neah Bay) nitsuke with hari ginger and fresh gobo',	NULL,	'Y',	'N',	'Y',	'FS',	'N',	'N',	NULL,	NULL),
(48,	'Nodoguro (Alaska) nitsuke with hari ginger and fresh gobo',	23,	'Y',	'N',	'Y',	'FS',	'N',	'N',	NULL,	'2019-03-05 08:33:40'),
(49,	'Sockeye salmon (Johnson Strait, B.C.) kama shioyaki',	NULL,	'Y',	'N',	'Y',	'FS',	'N',	'N',	NULL,	'2019-04-26 06:16:28'),
(50,	'Halibut (Neah Bay, WA) tempura served with matcha sea salt',	18,	'Y',	'N',	'N',	'TM',	'N',	'Y',	NULL,	'2019-05-20 11:10:05'),
(51,	'Neah Bay Rockfish nitsuke with hari ginger and fresh gobo',	NULL,	'Y',	'N',	'Y',	'FS',	'N',	'N',	NULL,	NULL),
(52,	'Spring King salmon (Washington) kama shioyaki',	NULL,	'Y',	'N',	'Y',	'FS',	'N',	'N',	NULL,	NULL),
(53,	'Pan seared Copper River smelt served with ponzu dipping sauce',	14,	'Y',	'N',	'N',	'FS',	'N',	'N',	NULL,	NULL),
(54,	'Black rockfish (Neah Bay) nitsuke with hari ginger and fresh gobo',	NULL,	'Y',	'N',	'Y',	'FS',	'N',	'N',	NULL,	NULL),
(55,	'Rooftop nasu eggplant misoni',	7,	'N',	'N',	'Y',	'AP',	'N',	'N',	NULL,	NULL),
(56,	'Copper River sockeye salmon kama shioyaki',	NULL,	'Y',	'N',	'Y',	'FS',	'N',	'N',	NULL,	'2019-05-25 06:12:41'),
(57,	'Red rockfish (Neah Bay, WA) nitsuke with hari ginger and fresh gobo',	NULL,	'Y',	'N',	'Y',	'FS',	'N',	'N',	NULL,	NULL),
(58,	'Chawan mushi with jidori eggs, snow crab and Neah Bay black cod /12 - add matsutake',	4,	'Y',	'N',	'Y',	'AP',	'N',	'N',	'2018-10-15 06:25:10',	'2018-10-19 10:13:56'),
(59,	'Black Seabass (Neah Bay) kama nitsuke with hari ginger and fresh gobo',	15,	'Y',	'N',	'Y',	'FS',	'N',	'N',	'2018-10-21 06:26:12',	'2018-10-22 06:29:08'),
(60,	'Petrale sole (Neah Bay, WA) steamed with fresh ginger, scallions, Thai soy sauce and topped with sizzling peanut oil',	NULL,	'Y',	'N',	'N',	'FS',	'N',	'N',	'2018-11-16 08:32:23',	'2018-11-16 09:07:56'),
(61,	'Kinmedai (Japan) aradaki with hari ginger and fresh gobo',	NULL,	'N',	'N',	'Y',	'FS',	'N',	'N',	'2018-12-29 08:32:02',	'2018-12-29 08:32:02'),
(62,	'Nova Scotia Lobster sashimi with sake butter sauce',	55,	'Y',	'Y',	'Y',	'FS',	'N',	'N',	'2019-02-18 08:42:02',	'2019-02-18 08:42:54'),
(63,	'Kumamoto oysters on the half shell with momiji ponzu',	22,	'Y',	'Y',	'Y',	'AP',	'N',	'N',	'2019-04-03 06:28:06',	'2019-04-03 06:28:06'),
(64,	'Shigoku oysters on the half shell with momiji ponzu',	22,	'Y',	'Y',	'Y',	'AP',	'N',	'Y',	NULL,	'2019-06-23 06:21:38');

INSERT INTO `lunches` (`lunch_id`, `title`, `subtitle`, `combo_title`, `combo_desc`, `created_at`, `updated_at`) VALUES
(1,	'Gozen',	'',	'All gozen Include:',	"Hijiki, agedashi tofu, string beans, and miso soup   Substitute with chawanmushi for miso +4 Add chef\'s sashimi selection +10 Add yuzu yogurt panna cotta +3",	NULL,	'2018-06-25 18:02:14'),
(2,	'Combinations',	'',	'',	'All combinations are served with miso soup / \r\n                with all sustainable fish +3 \r\n                Substitute with chawanmushi for miso +4',	NULL,	'2019-04-08 10:19:38'),
(3,	'Noodle',	'',	'',	'',	'2018-06-02 08:24:11',	'2018-06-07 17:31:40'),
(4,	'Lunch Ippins',	NULL,	NULL,	NULL,	'2018-06-02 08:47:54',	'2018-06-02 08:47:54');


INSERT INTO `l_items` (`l_item_id`, `name`, `price`, `description`, `is_raw`, `lunch_id`, `created_at`, `updated_at`) VALUES
(1,	'Asa Gozen',	23,	'Wild sockeye salmon shioyaki and organic tamago yaki',	'N',	1,	NULL,	NULL),
(2,	'Hiru Gozen',	28,	"Braised Snake River Ranch Wagyu beef skirt steak and maitake mushrooms konabe and Chef\'s sashimi selection of the day",	'Y',	1,	NULL,	NULL),
(3,	'Nigiri Gozen',	33,	"seven pieces of chef\'s choice nigiri sushi",	'Y',	1,	NULL,	NULL),
(4,	'Bara Chirashi',	25,	'Sushi rice layered with nori, shrimp oboro, tamago, ginger and topped with a mix of tuna, salmon, yellowtail, albacore and ikura',	'Y',	2,	NULL,	NULL),
(5,	'Tempura Udon',	19,	'Udon with two wild gulf prawn tempura with scallion',	'N',	3,	NULL,	NULL),
(6,	'Mustard greens and Washington albacore tuna dressed with an almond wasabi sauce',	10,	NULL,	'Y',	4,	NULL,	NULL),
(7,	'Organic spring mix, radishes, toasted almonds and Washington Fuji apples tossed in a sweet miso dressing',	15,	NULL,	'N',	4,	NULL,	NULL),
(8,	'Totten Shigoku oysters on the half shell with momiji ponzu',	20,	NULL,	'Y',	4,	NULL,	NULL),
(9,	'Chawan mushi with Jidori eggs, red crab and Neah Bay black cod',	11,	NULL,	'N',	4,	NULL,	NULL),
(10,	'Tempura Udon Combo',	25,	'Tempura udon with 3 pieces of nigiri of maguro, hamachi, and sockeye salmon',	'Y',	3,	NULL,	NULL),
(15,	'Sushi Combo',	28,	'7 pieces of nigiri with a roll',	'Y',	2,	NULL,	NULL),
(16,	'Deluxe Sushi Combo',	33,	'9 pieces of nigiri with a roll',	'Y',	2,	NULL,	NULL),
(17,	'Sashimi Combo',	30,	'Daily selection of sashimi served with rice',	'Y',	2,	NULL,	NULL);


INSERT INTO `rolls` (`roll_id`, `name`, `description`, `price`, `is_sustainable`, `is_raw`, `is_gf`, `category`, `is_special`, `is_on_menu`, `created_at`, `updated_at`) VALUES
(1,	'Black Cod, Avocado & Cucumber',	'Grilled Neah Bay black cod, avocado and cucumber',	12,	'Y',	'N',	'Y',	'SP_R',	'N',	'Y',	NULL,	NULL),
(2,	'Black Dragon Roll',	'Shrimp tempura, avocado, cucumber topped with grilled black cod, black tobiko, yuzu gosh and tsume sauce',	23,	'N',	'Y',	'N',	'SP_R',	'N',	'Y',	NULL,	'2018-09-12 07:49:01'),
(3,	'California Roll',	'Crab, avocado, mayo, cucumber, masago',	10,	'N',	'Y',	'N',	'R',	'N',	'Y',	NULL,	'2018-05-30 08:08:25'),
(4,	'Negihama Roll',	'Yellowtail, green onions, avocado, cucumber',	10,	'N',	'Y',	'Y',	'R',	'N',	'Y',	NULL,	NULL),
(5,	'Avocado Roll',	'Fresh avocado',	4,	'N',	'N',	'Y',	'VG_R',	'N',	'Y',	NULL,	NULL),
(6,	'Eastlake Vegetable Roll',	'Satsuma yam and kabocha squash tempura, romaine lettuce, cucumber, avocado and ume paste',	9,	'N',	'N',	'N',	'VG_R',	'N',	'Y',	NULL,	NULL),
(7,	'Oishi Roll',	'Shrimp tempura, avocado, and cucumber topped with seared creamy spicy crab, scallop and masago',	20,	'N',	'Y',	'N',	'SP_R',	'N',	'Y',	'2018-03-20 21:05:39',	'2018-03-20 21:05:39'),
(8,	'Ebi-Tempura Roll',	'Wild Shrimp tempura, cucumber, avocado, masago',	11,	'N',	'Y',	'N',	'R',	'N',	'Y',	'2018-03-20 21:06:31',	'2018-03-20 21:06:31'),
(9,	'Golden Dragon Roll',	'Spicy tuna, avocado, cucumber, and jalapeno inside topped with spicy tuna and golden tobiko',	23,	'N',	'Y',	'N',	'SP_R',	'N',	'Y',	'2018-05-30 07:58:44',	'2018-05-30 07:58:44'),
(10,	'Hamtastic Roll',	'Yellowtail, green onions, cucumber, avocado topped with yellowtail, jalapeno, golden tobiko and ponzu',	23,	'N',	'Y',	'N',	'SP_R',	'N',	'Y',	'2018-05-30 07:59:46',	'2018-05-30 08:01:41'),
(11,	'Rising Salmon Roll',	'Wild salmon, avocado, cucumber topped with seared salmon, nikiri sauce, jalapeno and golden tobiko',	21,	'N',	'Y',	'N',	'SP_R',	'N',	'Y',	'2018-05-30 08:07:40',	'2018-05-30 08:07:40'),
(12,	'Gari Saba',	'Japanese mackerel, ginger, shiso leaf',	9,	'Y',	'Y',	'Y',	'R',	'N',	'Y',	'2018-05-30 08:41:05',	'2018-05-30 08:41:05'),
(13,	'Futomaki',	'kampyo fourd, organic tamago, spinach, shrimp oboro',	9,	'N',	'Y',	'Y',	'R',	'N',	'Y',	'2018-05-30 08:42:08',	'2018-05-30 08:42:08'),
(14,	'Rosanna Roll',	'Hokkaido sea scallops, crab, masago, avocado, mayo',	9,	'N',	'Y',	'N',	'R',	'N',	'Y',	'2018-05-30 08:43:01',	'2018-05-30 08:43:01'),
(15,	'Salmon Skin Roll',	'Kaiware, green onion, gobo, broiled wild salmon skin',	8,	'Y',	'N',	'Y',	'R',	'N',	'Y',	'2018-05-30 08:43:40',	'2018-05-30 08:43:40'),
(16,	'Seattle Roll',	'Wild salmon, avocado, cucumber, masago',	10,	'Y',	'Y',	'N',	'R',	'N',	'Y',	'2018-05-30 08:51:09',	'2018-05-30 08:51:09'),
(17,	'Spicy Tuna Roll',	'Tuna, spicy chili sauce, cucumber, avocado',	9,	'N',	'Y',	'N',	'R',	'N',	'Y',	'2018-05-30 08:51:45',	'2018-05-30 08:51:45'),
(18,	'Spider Roll',	'Fried Maryland blue soft shell crab, cucumber, avocado, masago',	13,	'Y',	'Y',	'Y',	'R',	'N',	'Y',	'2018-05-30 08:52:38',	'2018-05-30 08:52:38'),
(19,	'Cucumber and Avocado Roll',	'Fresh avocado and cucumber slices',	5,	'N',	'N',	'Y',	'VG_R',	'N',	'Y',	'2018-05-30 08:53:34',	'2018-05-30 08:53:34'),
(20,	'Oshinko Maki',	'Pickled daikon radish',	4,	'N',	'N',	'Y',	'VG_R',	'N',	'Y',	'2018-05-30 08:54:02',	'2018-05-30 08:54:02'),
(21,	'Kappa Maki',	'Cucumber roll',	4,	'N',	'N',	'Y',	'VG_R',	'N',	'Y',	'2018-05-30 08:54:26',	'2018-05-30 08:54:26'),
(22,	'Super Yummy Roll',	'Spinach, shiitake, kampyo gourd, avocado, pickled plum, shiso leaf',	8,	'N',	'N',	'Y',	'VG_R',	'N',	'Y',	'2018-05-30 08:55:28',	'2018-05-30 08:55:28'),
(23,	'Ume Shiso Roll',	'Pickled plum, shiso leaf, cucumber',	4,	'N',	'N',	'Y',	'VG_R',	'N',	'Y',	'2018-05-30 08:55:57',	'2018-05-30 08:55:57');


INSERT INTO `sbs` (`sb_id`, `eng_name`, `jpn_name`, `origin`, `nigiri_price`, `sashimi_price`, `is_sustainable`, `is_raw`, `is_special`, `is_on_menu`) VALUES
(1,	'Blue Prawns',	'Ebi',	'Mexico',	4.0,	8.0,	'Y',	'N',	'N',	'Y'),
(2,	'Albacore Tuna, belly',	'',	'WA',	6.0,	12.0,	'Y',	'Y',	'N',	'N'),
(3,	'Sockeye Salmon',	'',	'Alaska',	5.0,	10.0,	'Y',	'Y',	'Y',	'N'),
(4,	'Sockeye Salmon, belly',	'',	'Alaska',	6.0,	12.0,	'Y',	'Y',	'Y',	'N'),
(5,	'King Salmon',	'',	'Washington',	6.0,	12.0,	'Y',	'Y',	'Y',	'Y'),
(6,	'King Crab California Roll',	'',	'',	12.0,	NULL,	'Y',	'N',	'Y',	'N'),
(7,	'Sea Urchin',	'Uni',	'California',	6.0,	12.0,	'Y',	'Y',	'Y',	'N'),
(8,	'Striped Bass',	'Suzuki',	'Japan',	5.0,	10.0,	'Y',	'Y',	'Y',	'N'),
(9,	'Amberjack',	'Kanpachi',	'Kona, HI',	4.0,	8.0,	'Y',	'Y',	'Y',	'Y'),
(10,	'Black Cod Belly, grilled',	'',	'Neah Bay',	5.0,	10.0,	'Y',	'N',	'Y',	'Y'),
(11,	'Halibut, kelp cured',	'',	'Neah Bay',	5.0,	10.0,	'Y',	'Y',	'Y',	'N'),
(12,	'Halibut Engawa, Seared',	'',	'Neah Bay',	6.0,	12.0,	'Y',	'Y',	'Y',	'Y'),
(13,	'Herring',	'Nishin',	'British Colombia',	3.5,	7.0,	'Y',	'Y',	'Y',	'Y'),
(14,	'Jidori Egg Omelet',	'Tamago',	'',	3.0,	6.0,	'N',	'N',	'N',	'Y'),
(15,	'King Crab',	'',	'Alaska',	6.0,	12.0,	'Y',	'N',	'N',	'Y'),
(16,	'Black Rockfish',	'',	'Neah Bay',	4.0,	8.0,	'Y',	'N',	'Y',	'N'),
(17,	'Razor Clam',	'',	'Washington',	5.0,	10.0,	'Y',	'N',	'Y',	'N'),
(18,	'Mackerel',	'Saba',	'Norway',	3.0,	6.0,	'Y',	'Y',	'Y',	'Y'),
(19,	'Octopus',	'Tako',	'Spain',	3.0,	6.0,	'Y',	'N',	'Y',	'Y'),
(20,	'Geoduck',	'Mirugai',	'Puget Sound',	9.0,	18.0,	'Y',	'Y',	'N',	'N'),
(21,	'Salmon Roe (Chum)',	'Ikura',	'Washington',	5.0,	10.0,	'Y',	'Y',	'Y',	'Y'),
(22,	'Rock fish',	'',	'Neah Bay',	3.0,	6.0,	'Y',	'Y',	'Y',	'N'),
(23,	'Sea Eel',	'Anago',	'Japan',	5.0,	10.0,	'N',	'N',	'N',	'Y'),
(24,	'Sea Scallops',	'Hotate',	'Hokkaido',	4.0,	8.0,	'Y',	'Y',	'Y',	'Y'),
(25,	'Smelt Roe',	'Masago',	'Canada',	3.0,	6.0,	'Y',	'Y',	'Y',	'Y'),
(26,	'Spot Prawn',	'Amaebi',	'Alaska',	5.0,	10.0,	'Y',	'Y',	'Y',	'Y'),
(27,	'King Salmon',	'',	'Copper River',	12.0,	24.0,	'Y',	'Y',	'Y',	'N'),
(28,	'Squid',	'Surume Ika',	'Japan',	4.0,	8.0,	'Y',	'N',	'Y',	'Y'),
(29,	'Squid Tentacles',	'Ika Geso',	'Japan',	4.0,	8.0,	'Y',	'N',	'N',	'Y'),
(30,	'Surf Clam',	'Hokkigai',	'Nova Scotia',	3.5,	7.0,	'Y',	'N',	'Y',	'N'),
(31,	'Tuna',	'Maguro',	'South Pacific',	5.0,	10.0,	'N',	'Y',	'Y',	'Y'),
(32,	'White Prawns',	'Ebi',	'Gulf of Mexico',	3.5,	7.0,	'Y',	'N',	'Y',	'N'),
(33,	'Yellowtail',	'Hamachi',	'Kagoshima, Japan',	5.0,	10.0,	'N',	'Y',	'N',	'Y'),
(34,	'King Salmon, white',	'',	'Alaska',	7.0,	14.0,	'Y',	'Y',	'Y',	'N'),
(35,	'King Salmon, marble',	'',	'Washington',	6.0,	12.0,	'Y',	'Y',	'Y',	'N'),
(36,	'Albacore Tuna',	'',	'Washington',	5.0,	10.0,	'Y',	'Y',	'N',	'Y'),
(37,	'Sea Urchin',	'Uni',	'British Colombia',	7.0,	14.0,	'Y',	'Y',	'Y',	'N'),
(38,	'Chum Salmon',	'',	'Yukon, AK',	5.0,	10.0,	'Y',	'Y',	'Y',	'N'),
(39,	'King Salmon, white',	'',	'Neah Bay',	6.0,	12.0,	'Y',	'Y',	'Y',	'N'),
(40,	'Halibut',	'',	'Neah Bay, WA',	5.0,	10.0,	'Y',	'Y',	'Y',	'Y'),
(41,	'Coho Salmon',	'',	'Alaska',	4.0,	8.0,	'Y',	'Y',	'Y',	'N'),
(42,	'Sea Urchin',	'Uni',	'East Coast',	5.0,	10.0,	'Y',	'Y',	'Y',	'N'),
(43,	'Silver Smelt',	'',	'Washington Coast',	4.0,	8.0,	'Y',	'Y',	'Y',	'Y'),
(44,	'Sea Urchin',	'Uni',	'Santa Barbara',	7.0,	14.0,	'Y',	'Y',	'Y',	'N'),
(45,	'Spot Prawn (Live)',	'Amaebi',	'Washington',	6.0,	12.0,	'Y',	'Y',	'Y',	'N'),
(46,	'Spanish Mackerel',	'Aji',	'Japan',	6.0,	12.0,	'N',	'Y',	'Y',	'Y'),
(47,	'Grunt',	'Isaki',	'Japan',	6.0,	12.0,	'Y',	'Y',	'Y',	'N'),
(48,	'Grouper',	'Hata',	'(Florida)',	5.0,	10.0,	'Y',	'Y',	'Y',	'N'),
(49,	'Parrot Fish',	'Ishigaki dai',	'Japan',	5.0,	10.0,	'Y',	'Y',	'Y',	'N'),
(50,	'Salmon Roe (King)',	'Ikura',	'WA',	6.0,	12.0,	'Y',	'Y',	'Y',	'N'),
(51,	'Trevally',	'Shimaaji',	'',	5.0,	10.0,	'Y',	'Y',	'Y',	'N'),
(52,	'Edo-mae Tamago',	'',	'',	6.0,	12.0,	'Y',	'N',	'Y',	'N'),
(53,	'Giant Octopus',	'Mizudako',	'Bering Sea',	3.0,	6.0,	'Y',	'N',	'N',	'N'),
(54,	'Fluke/ Hirame',	'',	'East Coast',	5.0,	10.0,	'Y',	'Y',	'N',	'N'),
(55,	'Fluke Engawa, seared',	'',	'East Coast',	6.0,	12.0,	'Y',	'Y',	'Y',	'N'),
(56,	'Salmon Roe (Coho)',	'Ikura',	'WA',	6.0,	12.0,	'Y',	'Y',	'Y',	'N'),
(57,	'Sea Urchin',	'Uni',	'San Juan Islands',	6.0,	12.0,	'Y',	'Y',	'Y',	'N'),
(58,	'Rooftop Eggplant',	'Nasu',	'',	3.0,	0.0,	'Y',	'N',	'Y',	'N'),
(59,	'Sea Scallops Seared w/Yuzu Gosho',	'',	'',	4.5,	9.0,	'Y',	'Y',	'Y',	'Y'),
(60,	'Sockeye Salmon',	'',	'Yukon',	6.0,	12.0,	'Y',	'Y',	'Y',	'N'),
(61,	'Cod Milt',	'Shirako',	'Alaska',	4.0,	8.0,	'Y',	'N',	'Y',	'N'),
(62,	'Chutoro',	'',	'Ehime, Japan',	6.0,	12.0,	'N',	'Y',	'N',	'N'),
(63,	'King Salmon, spring',	'',	'Washington',	8.0,	16.0,	'Y',	'Y',	'Y',	'N'),
(64,	'Yellow Surf Clam',	'Aoyagi',	'Oregon',	5.0,	10.0,	'Y',	'N',	'Y',	'N'),
(65,	'Opakapaka',	'',	'Hawaii',	5.0,	10.0,	'Y',	'Y',	'Y',	'N'),
(66,	'Sea Urchin',	'Uni',	'Hokkaido',	11.0,	22.0,	'Y',	'Y',	'Y',	'Y'),
(67,	'Porgy',	'Kurodai',	'',	4.0,	8.0,	'Y',	'Y',	'Y',	'N'),
(68,	'Herring Roe',	'Kazunoko',	'B.C.',	3.0,	6.0,	'Y',	'Y',	'Y',	'N'),
(69,	'Marinated Tuna',	'Tuna Zuke',	'South Pacific',	5.0,	10.0,	'Y',	'Y',	'Y',	'N'),
(70,	'Cockle',	'Torigai',	'Tillamook, OR',	5.0,	10.0,	'Y',	'Y',	'N',	'N'),
(71,	'Golden Eye Snapper',	'',	'Japan',	7.0,	14.0,	'N',	'Y',	'Y',	'N'),
(72,	'Lobster',	'',	'Nova Scotia',	NULL,	65.0,	'Y',	'N',	'Y',	'N'),
(73,	'Cherry Salmon',	'Sakuramasu',	'Japan',	7.0,	14.0,	'Y',	'Y',	'Y',	'N'),
(74,	'King Salmon, belly',	'',	'Washington',	7.0,	14.0,	'Y',	'Y',	'Y',	'N'),
(75,	'Cabezon',	'',	'Neah Bay',	5.0,	10.0,	'Y',	'N',	'Y',	'N'),
(76,	'Ocean Perch',	'',	'Washington',	3.0,	6.0,	'Y',	'Y',	'Y',	'N'),
(77,	'Seabream',	'Madai',	'Japan',	5.0,	10.0,	'N',	'Y',	'N',	'Y'),
(78,	'Yellowtail, belly',	'Hamachi, belly',	'',	6.0,	12.0,	'N',	'Y',	'N',	'Y'),
(79,	'Sea Urchin',	'Uni',	'Hokkaido',	11.0,	22.0,	'N',	'Y',	'Y',	'N'),
(80,	'Negitoro Handroll',	'',	'',	11.0,	NULL,	'N',	'Y',	'N',	'N'),
(81,	'King Salmon belly',	'',	'Washington',	8.0,	16.0,	'Y',	'Y',	'Y',	'N'),
(82,	'Bay Shrimp, Creamy',	'',	'Oregon',	4.0,	8.0,	'Y',	'Y',	'N',	'N'),
(83,	'Tilefish',	'Amadai',	'New England',	4.0,	8.0,	'Y',	'Y',	'Y',	'N'),
(84,	'Sea Urchin',	'Uni',	'Maine',	8.0,	16.0,	'N',	'Y',	'N',	'N'),
(85,	'King Salmon, belly',	'',	'Copper River',	11.0,	22.0,	'Y',	'Y',	'Y',	'N'),
(86,	'Sockeye Salmon',	'',	'Fraser River',	5.0,	10.0,	'Y',	'Y',	'Y',	'Y'),
(87,	'Sockeye Salmon, belly',	'',	'Fraser River',	6.0,	12.0,	'Y',	'Y',	'Y',	'Y'),
(88,	'King Mackerel',	'Sawara',	'East Coast',	4.0,	8.0,	'Y',	'Y',	'Y',	'Y'),
(89,	'Coho Salmon, belly',	'',	'Neah Bay',	6.0,	12.0,	'Y',	'Y',	'Y',	'N'),
(90,	'King Salmon, white, belly',	'',	'Washington',	7.0,	14.0,	'Y',	'Y',	'Y',	'N'),
(91,	'King Salmon, Ivory',	'',	'Washington',	6.0,	12.0,	'Y',	'Y',	'Y',	'N'),
(92,	'Halibut',	'',	'Alaska',	5.0,	10.0,	'Y',	'Y',	'Y',	'N'),
(93,	'Branzino',	'Suzuki',	'Greece',	4.0,	8.0,	'Y',	'Y',	'Y',	'Y'),
(94,	'Branzino',	'Suzuki',	'Greece',	4.0,	8.0,	'Y',	'Y',	'N',	'N'),
(95,	'Sea Urchin',	'Uni',	'Peru',	7.0,	14.0,	'Y',	'Y',	'Y',	'N'),
(96,	'Seabass',	'Suzuki',	'Japan',	5.0,	10.0,	'Y',	'Y',	'Y',	'N'),
(97,	'Sea Urchin',	'Uni',	'Mexico',	7.0,	14.0,	'Y',	'Y',	'N',	'N'),
(98,	'Trevally',	'Shimaaji',	'Japan',	6.0,	12.0,	'N',	'Y',	'N',	'N'),
(99,	'Black Seabass',	'Mebaru',	'Neah Bay',	4.0,	8.0,	'Y',	'Y',	'N',	'N'),
(100,	'Striped Bass',	'Suzuki',	'Mexico',	4.0,	8.0,	'Y',	'Y',	'N',	'N'),
(101,	'King Salmon',	'',	'Alaska',	6.0,	12.0,	'Y',	'Y',	'N',	'N'),
(102,	'Spot Prawn Live',	'Amaebi',	'B.C.',	5.0,	10.0,	'Y',	'Y',	'N',	'N'),
(103,	'Toro',	'',	'South Pacific',	10.0,	20.0,	'N',	'Y',	'N',	'N'),
(104,	'Otoro',	'',	'South Pacific',	12.0,	24.0,	'N',	'Y',	'N',	'N'),
(105,	'Dolly Varden',	'Amemasu',	'Bristol Bay',	4.0,	8.0,	'N',	'Y',	'N',	'N'),
(106,	'Red Rockfish',	'Kasago',	'Neah Bay',	4.0,	8.0,	'N',	'Y',	'N',	'N'),
(107,	'Sea Urchin',	'Uni',	'San Juan',	6.0,	12.0,	'Y',	'Y',	'N',	'N'),
(108,	'Sockeye Salmon',	'',	'Copper River',	8.0,	16.0,	'Y',	'Y',	'N',	'N'),
(109,	'Sockeye Salmon, belly',	'',	'Copper River',	10.0,	20.0,	'Y',	'Y',	'N',	'N'),
(110,	'Otoro',	'',	'Ehime, Japan',	12.0,	24.0,	'N',	'Y',	'N',	'Y'),
(111,	'Toro',	'',	'Ehime, Japan',	11.0,	22.0,	'N',	'Y',	'N',	'Y'),
(112,	'Chutoro',	'',	'South Pacific',	7.0,	14.0,	'N',	'Y',	'N',	'N'),
(113,	'Yellowtail Kingfish',	'Hiramasa',	'Australia',	5.0,	10.0,	'Y',	'Y',	'N',	'N'),
(114,	'Pike Mackerel',	'Sanma',	'Miyagi, Japan',	6.0,	12.0,	'N',	'Y',	'N',	'N'),
(115,	'Opilio Crab',	'Zuwaigani',	'Alaska',	5.0,	10.0,	'Y',	'N',	'N',	'Y');


-- 2019-07-04 16:25:46