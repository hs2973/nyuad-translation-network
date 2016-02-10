-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 10, 2016 at 01:02 AM
-- Server version: 5.5.45-cll-lve
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `translation_network_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `text` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `author_email` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  `is_translation` tinyint(1) NOT NULL,
  `is_featured` tinyint(1) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `is_approved` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `text`, `author_name`, `language`, `author_email`, `date_created`, `is_translation`, `is_featured`, `parent_id`, `is_approved`) VALUES
(1, 'Discomfort of Home', '<p>Ladies and Gentlemen, welcome to Budapest Ferenc Liszt International Airport, local time is 11:20AM and the temperature is 32 degrees Centigrade. We ask you to remain seated and keep your seatbelts fastened until the plane has come to a full stop and our Captain has turned off the Fasten Seat Belt sign.</p><p>Bus, immigration, luggage, hey mom, hugs kisses, wow it&rsquo;s hot here, heavy luggage, front seat.</p><p>City, cell phone works, streets, dentist, the library, Moszkva square, drive up, serpentine, right, up, left, right.</p><p>Front door, no mail, familiar smell, favorite dish, bath, tiling still cracked, cat does not care.</p><p>Call, can&rsquo;t believe you&rsquo;re home, yes trip was fine, when, who is coming, sure.</p><p>Night, mall still there, green wrought iron fence, full, looking for table, 5 people.</p><p>Hugs, kisses, you&rsquo;re still white, my god I can&rsquo;t believe, how&rsquo;s Scotland, how&rsquo;s the Hague, how&rsquo;s London, how&rsquo;s Budapest.</p><p>To J&auml;ger, talk, To P&aacute;linka, talk, To Borsodi, laugh, To Absolut, sing, To Wine, cry, hugs, kisses, bye, cab.</p><p>Drive up, serpentine, right, up, left, right.</p><p>Front door, still no mail, familiar smell, bath, cat does not care.</p><p>Afternoon, call, can&rsquo;t believe you&rsquo;re home, yes trip was fine, when, who is coming, sure.</p><p>Moszkva square, drive down, 5 hours&hellip; Moszkva square, bus, drive up, serpentine, get off, right, up, left, right.</p><p>Call, can&rsquo;t believe you&rsquo;re home, when, who is coming, sure, wait what, tomorrow already?</p><p>Ladies and Gentlemen, welcome to Abu Dhabi International Airport, local time is 4:55AM and the temperature is 40 degrees Centigrade. We ask you to remain seated and keep your seatbelts fastened until the plane has come to a full stop and our Captain has turned off the Fasten Seat Belt sign.</p><p>Bus, immigration, luggage, wow it&rsquo;s hot here, bus.</p><p>Oh my God, I have missed you so much, did you get in okay? How was home?</p><p>Comfortable.</p>', 'Vlad Maksimov', 'English', 'vladislav.maksimov@nyu.edu', '2015-11-28 10:27:18', 0, 1, 0, 1),
(2, 'Home', '<p>Home is where I can close my eyes without the stabbing need to imagine</p><p>Where I don&rsquo;t have to scourge the darkest recesses of my mind</p><p>&nbsp;</p><p>For wisps of familiarity</p><p>Where every book and chore and spoon</p><p>Tell a story</p><p>Of warmth, and sunshine, and something forgotten, fondly remembered.</p><p>I see Home in black, and white, and yellow</p><p>And red, sometimes; the danger soothes me slowly</p><p>In the dark, I could be anywhere at all</p><p>Here or there</p><p>And nobody would ever know.</p><p>They would never find me. And I would never find them.</p><p>Objects do not make a home but I live in a museum</p><p>Just in case they prove me wrong</p><p>I hope, everyday, that they prove me wrong</p><p>Resignation is a strange thing</p><p>The opposite of acceptance, and yet exactly the same.</p><p>Home is here. Home is there. Home is a memory.</p><p>I find no comfort in nostalgia. But it will have to do for now.</p>', 'Supriya Kamath', 'English', 'sk5838@nyu.edu', '2015-11-26 00:00:00', 0, 1, 0, 1),
(3, 'घर', '<span id="docs-internal-guid-871c4118-4fd7-0ebf-282f-175f4d0fe0bc"><p dir="ltr" style="line-height:1.7999999999999998;margin-top:0pt;margin-bottom:0pt;text-align: justify;"><span style="font-size: 14.6667px; font-family: Arial; vertical-align: baseline; white-space: pre-wrap;">घर में पलकें बंद कर भी</span></p><p dir="ltr" style="line-height:1.7999999999999998;margin-top:0pt;margin-bottom:0pt;text-align: justify;"><span style="font-size: 14.6667px; font-family: Arial; vertical-align: baseline; white-space: pre-wrap;">कल्पना की अलन्ध्य आवश्यकता</span></p><p dir="ltr" style="line-height:1.7999999999999998;margin-top:0pt;margin-bottom:0pt;text-align: justify;"><span style="font-size: 14.6667px; font-family: Arial; vertical-align: baseline; white-space: pre-wrap;">परिकल्पना ही रह जाती है |</span></p><p dir="ltr" style="line-height:1.7999999999999998;margin-top:0pt;margin-bottom:0pt;text-align: justify;"><span style="font-size: 14.6667px; font-family: Arial; vertical-align: baseline; white-space: pre-wrap;">वहाँ मन-ओ-मानस की गूढ़ गहराइयों में</span></p><p dir="ltr" style="line-height:1.7999999999999998;margin-top:0pt;margin-bottom:0pt;text-align: justify;"><span style="font-size: 14.6667px; font-family: Arial; vertical-align: baseline; white-space: pre-wrap;">सुपरिचय की खोज निरार्थ हो जाती है |</span></p><p dir="ltr" style="line-height:1.7999999999999998;margin-top:0pt;margin-bottom:0pt;text-align: justify;"><span style="font-size: 14.6667px; font-family: Arial; vertical-align: baseline; white-space: pre-wrap;">वहाँ हर किताब, काज या कड्ची</span></p><p dir="ltr" style="line-height:1.7999999999999998;margin-top:0pt;margin-bottom:0pt;text-align: justify;"><span style="font-size: 14.6667px; font-family: Arial; vertical-align: baseline; white-space: pre-wrap;">भूली-बिसरी यादगार धूप की दास्तान</span></p><p dir="ltr" style="line-height:1.7999999999999998;margin-top:0pt;margin-bottom:0pt;text-align: justify;"><span style="font-size: 14.6667px; font-family: Arial; vertical-align: baseline; white-space: pre-wrap;">सुनाती है |</span></p><p dir="ltr" style="line-height:1.7999999999999998;margin-top:0pt;margin-bottom:0pt;text-align: justify;"><span style="font-size: 14.6667px; font-family: Arial; vertical-align: baseline; white-space: pre-wrap;"> </span></p><p dir="ltr" style="line-height:1.7999999999999998;margin-top:0pt;margin-bottom:0pt;text-align: justify;"><span style="font-size: 14.6667px; font-family: Arial; vertical-align: baseline; white-space: pre-wrap;">घर श्वेत-श्याम, और पीले, और</span></p><p dir="ltr" style="line-height:1.7999999999999998;margin-top:0pt;margin-bottom:0pt;text-align: justify;"><span style="font-size: 14.6667px; font-family: Arial; vertical-align: baseline; white-space: pre-wrap;">लाल परतों में झलकता है;</span></p><p dir="ltr" style="line-height:1.7999999999999998;margin-top:0pt;margin-bottom:0pt;text-align: justify;"><span style="font-size: 14.6667px; font-family: Arial; vertical-align: baseline; white-space: pre-wrap;">कभी-कभी मुझे खतरे में </span></p><p dir="ltr" style="line-height:1.7999999999999998;margin-top:0pt;margin-bottom:0pt;text-align: justify;"><span style="font-size: 14.6667px; font-family: Arial; vertical-align: baseline; white-space: pre-wrap;">खामोशी मिलती है |</span></p><p dir="ltr" style="line-height:1.7999999999999998;margin-top:0pt;margin-bottom:0pt;text-align: justify;"><span style="font-size: 14.6667px; font-family: Arial; vertical-align: baseline; white-space: pre-wrap;">घर की अंधेरी परछाईयों में</span></p><p dir="ltr" style="line-height:1.7999999999999998;margin-top:0pt;margin-bottom:0pt;text-align: justify;"><span style="font-size: 14.6667px; font-family: Arial; vertical-align: baseline; white-space: pre-wrap;">धुलकर मैं यहाँ, वहाँ, जहाँ</span></p><p dir="ltr" style="line-height:1.7999999999999998;margin-top:0pt;margin-bottom:0pt;text-align: justify;"><span style="font-size: 14.6667px; font-family: Arial; vertical-align: baseline; white-space: pre-wrap;">भी हूँ, मुझे कोई नहीं ढूँढ सकता |</span></p><p dir="ltr" style="line-height:1.7999999999999998;margin-top:0pt;margin-bottom:0pt;text-align: justify;"><span style="font-size: 14.6667px; font-family: Arial; vertical-align: baseline; white-space: pre-wrap;">ना मैं, उन्हें |</span></p><p dir="ltr" style="line-height:1.7999999999999998;margin-top:0pt;margin-bottom:0pt;text-align: justify;"><span style="font-size: 14.6667px; font-family: Arial; vertical-align: baseline; white-space: pre-wrap;"> </span></p><p dir="ltr" style="line-height:1.7999999999999998;margin-top:0pt;margin-bottom:0pt;text-align: justify;"><span style="font-size: 14.6667px; font-family: Arial; vertical-align: baseline; white-space: pre-wrap;">चीज़ों से घर नहीं बनता, पर मैं</span></p><p dir="ltr" style="line-height:1.7999999999999998;margin-top:0pt;margin-bottom:0pt;text-align: justify;"><span style="font-size: 14.6667px; font-family: Arial; vertical-align: baseline; white-space: pre-wrap;">आयाबघर की आवासी हूँ</span></p><p dir="ltr" style="line-height:1.7999999999999998;margin-top:0pt;margin-bottom:0pt;text-align: justify;"><span style="font-size: 14.6667px; font-family: Arial; vertical-align: baseline; white-space: pre-wrap;">यदि किसी दिन मुझे गलत साबित किया जाए |</span></p><p dir="ltr" style="line-height:1.7999999999999998;margin-top:0pt;margin-bottom:0pt;text-align: justify;"><span style="font-size: 14.6667px; font-family: Arial; vertical-align: baseline; white-space: pre-wrap;">मेरी यही कामना है की किसी दिन</span></p><p dir="ltr" style="line-height:1.7999999999999998;margin-top:0pt;margin-bottom:0pt;text-align: justify;"><span style="font-size: 14.6667px; font-family: Arial; vertical-align: baseline; white-space: pre-wrap;">मुझे गलत साबित किया जाए |</span></p><p dir="ltr" style="line-height:1.7999999999999998;margin-top:0pt;margin-bottom:0pt;text-align: justify;"><span style="font-size: 14.6667px; font-family: Arial; vertical-align: baseline; white-space: pre-wrap;">निवृत्ति और स्वीकृति जितने अलग,</span></p><p dir="ltr" style="line-height:1.7999999999999998;margin-top:0pt;margin-bottom:0pt;text-align: justify;"><span style="font-size: 14.6667px; font-family: Arial; vertical-align: baseline; white-space: pre-wrap;">उतने ही समान है</span></p><p dir="ltr" style="line-height:1.7999999999999998;margin-top:0pt;margin-bottom:0pt;text-align: justify;"><span style="font-size: 14.6667px; font-family: Arial; vertical-align: baseline; white-space: pre-wrap;">अजीब है यह अजूबा |</span></p><p dir="ltr" style="line-height:1.7999999999999998;margin-top:0pt;margin-bottom:0pt;text-align: justify;"><span style="font-size: 14.6667px; font-family: Arial; vertical-align: baseline; white-space: pre-wrap;"> </span></p><p dir="ltr" style="line-height:1.7999999999999998;margin-top:0pt;margin-bottom:0pt;text-align: justify;"><span style="font-size: 14.6667px; font-family: Arial; vertical-align: baseline; white-space: pre-wrap;">यही घर है | वही घर है | घर स्मृति है |</span></p><p dir="ltr" style="line-height:1.7999999999999998;margin-top:0pt;margin-bottom:0pt;text-align: justify;"><span style="font-size: 14.6667px; font-family: Arial; vertical-align: baseline; white-space: pre-wrap;">विषाद में विश्राम बेबुनियाद है</span></p><span style="font-size: 14.6667px; font-family: Arial; vertical-align: baseline; white-space: pre-wrap;">पर अब के लिए, यही सही |</span></span>', 'Pranav Mehta', 'Hindi', '', '2015-11-28 10:35:21', 1, 1, 2, 1),
(4, 'Kāinga ko Te Reo', '<p>Ahakoa kāore a Papa i te korero a kaore au e mārama nui ka haere au ki te mahi. Engari ma wai aha e ako? Me aha?</p><p>E ako tonu ana ahau, a I muri i te Abu Dhabi ka hoki mai ahau. Ko nui te ao engari, otiia e u ana toku whakaaro i roto i te ahau, ka hohoro toku tae atu. Kei wareware i a tātou to tatou reo, a kei wareware i a tātou te kāinga.</p>', 'Megan Eloise', 'Maori', 'meganeloisevincent@gmail.com', '2015-11-28 10:48:14', 0, 1, 0, 1),
(5, 'Home is a language.', '<p>Although my dad doesn&rsquo;t speak and I don&rsquo;t understand a lot I am still learning. But who will teach me? What can be done?</p><p>After Abu Dhabi, I will return home. The world is big, but I trust in myself that I will visit soon. Lest we forget our language, and lest we forget our home.</p>', 'Megan Eloise', 'English', 'meganeloisevincent@gmail.com', '2015-11-28 10:48:14', 1, 0, 4, 1),
(6, 'El hogar es un idioma.', '<p>Aunque mi padre no puede hablar Te Reo y yo no entiendo mucho, estoy aprendiendo. Pero quien podr&iacute;a ense&ntilde;arme? Qu&eacute; se puede hacer?</p><p>Despu&eacute;s de Abu Dhabi, voy a volver a mi hogar. El mundo es grande, pero conf&iacute;o en mi misma que alg&uacute;n d&iacute;a volver&eacute;. No olvidemos nuestro idioma, no olvidemos nuestro hogar.</p>', 'Megan Eloise', 'Spanish', 'meganeloisevincent@gmail.com', '2015-11-28 10:48:14', 1, 0, 4, 1),
(7, 'Egyptian Song', '<p>a famous Egyptian song by Sayid Darwish modified to Khaleeji Dailect.​&nbsp;</p>\r\n\r\n<p style="text-align:right"><strong>اغنية المحششين:</strong></p>\r\n\r\n<p style="text-align:right"><strong>الله عليكم يا تحفة زمانكم</strong></p>\r\n\r\n<p style="text-align:right"><strong>ياللي فاهمين الموضوع و ذالحجي</strong></p>\r\n\r\n<p style="text-align:right"><strong>خلها ليلة صباحية يا ربي</strong></p>\r\n\r\n<p style="text-align:right"><strong>ذا يكيف المزاج اذا تدخل</strong></p>\r\n\r\n<p style="text-align:right"><strong>حبيبك وقتها يحنله </strong></p>\r\n\r\n<p style="text-align:right"><strong>ذاك الخضر الخلاب</strong></p>\r\n\r\n<p style="text-align:right"><strong>اسأل واحد فاهم مثل حضرتي</strong></p>\r\n\r\n<p style="text-align:right"><strong>محشش واصل القمم</strong></p>\r\n\r\n<p style="text-align:right">&nbsp;</p>\r\n\r\n<p style="text-align:right"><strong>صدق و اامن بخالقها</strong></p>\r\n\r\n<p style="text-align:right"><strong>و حجا ان يزوجها لكل من يخوضها</strong></p>\r\n\r\n<p style="text-align:right">&nbsp;</p>\r\n\r\n<p style="text-align:right"><strong>جاك يتقشمر على جماعتنا</strong></p>\r\n\r\n<p style="text-align:right"><strong>كلمني يوم تحل لك مشاكلك </strong></p>\r\n\r\n<p style="text-align:right"><strong>خل زوجتي تصد وجهي عن وضعكم</strong></p>\r\n\r\n<p style="text-align:right"><strong>واحلق فوق السحاب مثل الرومانسي</strong></p>\r\n', 'Mohamed Al-Mubarak', 'Arabic (Khaleeji)', 'mam1333@nyu.edu', '2015-12-19 10:24:10', 0, 0, 0, 1),
(25, 'Home', '<p dir="ltr" style="text-align: right;"><strong>عندما قلت لي بأن زهر الربيع تنبت حولنا، علمت بأننا سنجد في الحدائق المعلقة بدايتنا،</strong></p>\r\n\r\n<p dir="ltr" style="text-align: right;"><strong>وعندما قلت لي بأن أمواج الصيف تسابقنا، علمت بأننا سنجد في أعماق البحار أسرارنا، </strong></p>\r\n\r\n<p dir="ltr" style="text-align: right;"><strong>وعندما قلت لي بأن أوراق الأشجار تذبل معنا، علمت بأننا سنجد في فصل الخريف موسمنا، </strong></p>\r\n\r\n<p dir="ltr" style="text-align: right;"><strong>وعندما قلت لي بأن نجوم الشتاء تقودنا، علمت بأننا سنجد في فضاء الكون نهايتنا،</strong></p>\r\n\r\n<p dir="ltr" style="text-align: right;"><strong>وفي آخر ليلة من ليالينا، ودعتك لأرى بأننا قد وجدنا في رحلة تجاربنا موطننا</strong></p>\r\n\r\n<p style="text-align: right;">&nbsp;</p>\r\n', 'Anonymous', 'Arabic', 'saa581@nyu.edu', '2016-02-06 10:44:27', 0, 1, 0, 1),
(26, 'Ghar', '<p dir="rtl" style="text-align: left;"><strong>Ek haseen pal, ek ehsaas, jo hamesha saath rahe</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir="rtl" style="text-align: left;"><strong>Door ya paas, hamesha tumhara paas rahe </strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir="rtl" style="text-align: left;"><strong>Jo hamesha dil ko khush rakhe, </strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir="rtl" style="text-align: left;"><strong>Jis ki yaad hamesha satayy</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir="rtl" style="text-align: left;"><strong>Usse kehte hai ghar. </strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir="rtl" style="text-align: left;"><strong>Jiske yaad se aakhon mein aane lage aasoon </strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir="rtl" style="text-align: left;"><strong>Jiski khushboo se dil ko mile sukoon </strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir="rtl" style="text-align: left;"><strong>Usse kehte hai ghar. </strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir="rtl" style="text-align: left;"><strong>Ye koi chaar divaar wala baksa nahi </strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir="rtl" style="text-align: left;"><strong>Ye hai yaadon ki ek chathri jo de humein sahara.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir="rtl" style="text-align: left;"><strong>Iski sabse khubsoorat baat hai </strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir="rtl" style="text-align: left;"><strong>Ke ye kabhi hamein akela hone na de</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir="rtl" style="text-align: left;"><strong>Usko kehte hai ghar</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir="rtl" style="text-align: left;"><strong>Ghar vo log hote hai, jo dil ko khush rakehin </strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir="rtl" style="text-align: left;"><strong>Jinko dekh ke saari pareshaniyan jaaein door</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir="rtl" style="text-align: left;"><strong>Usse kehte hai ghar.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Shanzey Altaf', 'Hindi', 'shanzeyaltaf@nyu.edu', '2016-02-06 21:55:20', 0, 1, 0, 1),
(29, 'Home', '<p dir="rtl" style="text-align: left;"><strong>A beautiful moment, a feeling, which always is with you</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir="rtl" style="text-align: left;"><strong>Far or close, always with you</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir="rtl" style="text-align: left;"><strong>It always keeps the heart happy</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir="rtl" style="text-align: left;"><strong>Its thought is always in mind.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir="rtl" style="text-align: left;"><strong>That is what you call home.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir="rtl" style="text-align: left;"><strong>Its memory brings tears to the eyes</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir="rtl" style="text-align: left;"><strong>Its smell puts the heart to ease</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir="rtl" style="text-align: left;"><strong>That is what you call home.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir="rtl" style="text-align: left;"><strong>This is not a four-walled box</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir="rtl" style="text-align: left;"><strong>This is an umbrella filled with memories that always gives support</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir="rtl" style="text-align: left;"><strong>The most beautiful thing about it</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir="rtl" style="text-align: left;"><strong>That it never lets you be alone</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir="rtl" style="text-align: left;"><strong>That is what you call home.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir="rtl" style="text-align: left;"><strong>Home are those people that leave your heart happy</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir="rtl" style="text-align: left;"><strong>And when you see them, all your worries are gone</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir="rtl" style="text-align: left;"><strong>That is what you call home</strong></p>\r\n', 'Shanzey Altaf', 'English', 'shanzeyaltaf@nyu.edu', '2016-02-10 11:43:40', 0, 0, 26, 1),
(30, 'Underway', '<p><em>This is a small part of the translation I&#39;ve been working on, from the first chapter of the novel Die R&uuml;ckkehr: Roman meines Lebens [The Return: Novel of my Life] by Galsan Tschinag, originally written in German. </em></p>\r\n\r\n<p>Underway</p>\r\n\r\n<p>Once more I am underway. But this time differently than before &ndash; with a wife and a yurt and all that entails: cooking oven and utensils, including drinking vessels and dining things; bedclothes and blankets, including pillows and mats; children and step-children, together with their offspring, so also with dogs and cats, including their dishes. Only what concerns the human portion of this list appears in between the blur &ndash; at times I catch all of the children winding around me, at times I miss them all, except for the youngest limb of my five-headed grandpeople. And this blur dominates for so long, until I realize the seven-year-old is the one, ageless and unconditional, who chose us, his grandparents, and thus will also follow us to the end of the path.</p>\r\n\r\n<p>A further peculiarity of this dream demands to be mentioned: all three people that populate it, and go together within it like a tightly braided wick, carry old and forgotten names. The grandson is registered under the loud and meaningful name D&uuml;&uuml;rendshargal &ndash; Complete Happiness. But before this state registry could take place, I, his grandfather, called him Dsh&ouml;mb&uuml;k &ndash; Wits &ndash; when we held a reception on his third day of earthly existence, to smell his temples and so carry out the greeting ritual. My wife, known as Nordshmaa for half a century and enshrined this way in any official document, is now called Hassaa, just as she was called as a child by her father and mother. And I, Galsan, or so my identity card says, am now again &ndash; like countless other times, as soon as I pass border posts in the form of Ovoos, our holy sacrificial stone heaps, to arrive in Tuva country, undetectable on any geographical map &ndash; Dshuru</p>\r\n', 'Sachi Leith', 'English', 'sachi.leith@nyu.edu', '2016-02-10 11:52:07', 0, 0, 0, 1),
(31, 'Shahrazad’s Secret', 'small excerpt form the play, Shahrazad’s Secret,\ntranslated for a class on the One Thousand and One Nights \noriginal text in Arabic\n\n\n\n\nUm Shahar: I don’t know who took it away.\nNoor-alDeen: careful…\nUm Shahar: of?\nNoor-alDeen: Never mind it’s nothing … there they come... go ahead with this sword along your side…it must not be seen with me\nUm Shahar: Hide it under the couch (hides the sword then heads out)\nGuard: (appears at the door) here are the two men sir.\n(Two men enter, one is an old sheikh and the other an elderly man)\nSheikh: May peace be upon you\nNoor-alDeen: And upon you as well. (To Guard) run along.\nSheikh: (to Guard) and be careful with what we have left downstairs.\n(Guard exits)\nNoor-alDeen: (looks at both men then yells out surprised) Abu Al-Hasan Al-Haddad? Na’aman Shah Bandar the merchant!\nThe old man: you recognize us!\nNoor-alDeen: clothes don’t deceive me Na’aman (directing them to the couch) welcome. Please have a seat.\nAl-Sheikh: (sits down along with his friend) thank you Noor-alDeen...we have acknowledged your dislike of guest hospitality in your house, and if it weren’t urgent we wouldn’t have come to you.', 'Mai Awamleh', 'English', 'mha315@nyu.edu', '2016-02-10 12:01:00', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ci_cookies`
--

CREATE TABLE IF NOT EXISTS `ci_cookies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cookie_id` varchar(255) DEFAULT NULL,
  `netid` varchar(255) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `orig_page_requested` varchar(120) DEFAULT NULL,
  `php_session_id` varchar(40) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
