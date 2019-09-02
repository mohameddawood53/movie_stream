-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2019 at 03:47 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stream`
--

-- --------------------------------------------------------

--
-- Table structure for table `cast`
--

CREATE TABLE `cast` (
  `ID` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  `date` date NOT NULL,
  `details` text NOT NULL,
  `job` text NOT NULL,
  `deathday` date NOT NULL,
  `gender` varchar(16) NOT NULL,
  `img` varchar(300) NOT NULL,
  `IMDB` varchar(300) NOT NULL,
  `place` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cast`
--

INSERT INTO `cast` (`ID`, `name`, `date`, `details`, `job`, `deathday`, `gender`, `img`, `IMDB`, `place`) VALUES
(1, 'Mena Massoud', '1991-09-17', 'Mena Massoud is a Coptic Egyptian-Canadian actor. He was born to Coptic parents in Egypt and raised in Canada. In July 2017, he was cast to play Aladdin in Disney\'s live-action remake of Aladdin. Massoud was born in Cairo, Egypt to Egyptian Coptic Orthodox Christian parents. He has two older sisters. When he was young he emigrated to Canada. He grew up in Markham, Ontario, where he attended St. Brother André Catholic High School. He is vegan and is the founder of the plant-based food travel show Evolving Vegan.', 'Acting', '0000-00-00', 'male', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//yeaEd4P4kNlRkDqzunsQeh24rQm.jpg', 'https://www.imdb.com/name/nm4565815', 'Cairo, Egypt'),
(2, 'Naomi Scott', '1993-05-06', 'Naomi Grace Scott (born 6 May 1993) is an English actress and singer. Her mother, Usha Scott (née Joshi), is of Gujarati Indian descent from Uganda, and her father, Christopher Scott, is British.', 'Acting', '0000-00-00', 'Female', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//d140yTWCle6rYUGE9GIVZVPaPng.jpg', 'https://www.imdb.com/name/nm4305463', 'Hounslow, Greater London, England, UK'),
(3, 'Will Smith', '1968-09-25', 'Willard Christopher ', 'Acting', '0000-00-00', 'male', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//eze9FO9VuryXLP0aF2cRqPCcibN.jpg', 'https://www.imdb.com/name/nm0000226', 'Philadelphia, Pennsylvania, U.S.A.'),
(4, 'Marwan Kenzari', '1983-01-16', 'Marwan Kenzari was born on January 16, 1983 in The Hague, Zuid-Holland, Netherlands. He is an actor and costume designer.', 'Acting', '0000-00-00', 'male', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//k0qx65csI86rAFBR4Sal7phY3Vl.jpg', 'https://www.imdb.com/name/nm3092471', 'The Hague - Zuid-Holland - Netherlands'),
(5, 'Navid Negahban', '1968-06-02', 'Navid Negahban was born and raised in Mashhad, Iran. His passion for acting led him to Germany, where he spent eight years honing his theatrical skills prior to arriving in the US. Navid has been building a strong resume ever since, playing a broad range of intriguing characters for film, theatre, and television.Navid has a powerful leading role in the stunning dramatic feature The Stoning of Soraya M., and significant supporting roles in Brothers with Tobey Maguire, directed by Jim Sheridan, Powder Blue with Jessica Biel and Forest Whitaker, and Charlie Wilson\'s War opposite Tom Hanks, directed by Mike Nichols. On TV, Navid had a recurring role on the eighth and final season of 24, and guest appearances include Lost, CSI: Miami, Law & Order, Covert Affairs, and NCIS: Los Angeles. Navid recently (2011) appeared as Dr. Robert Stadler in Atlas Shrugged Part 1. He also shot The Power of Few in New Orleans with Christopher Walken and Christian Slater. Navid is currently (2011/2012) playing the chilling Abu Nazir on Showtime\'s Homeland, with Damian Lewis and Claire Danes. Credit:  J. Bass ', 'Acting', '0000-00-00', 'male', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//qxp9X0SIA0FWts2qK60IcrmUhnF.jpg', 'https://www.imdb.com/name/nm1041023', 'Mashhad, Iran'),
(6, 'Nasim Pedrad', '1981-11-18', 'Nasim Pedrad (born November 18, 1981) is an Iranian-American comic actress currently appearing as a cast member on Saturday Night Live.', 'Acting', '0000-00-00', 'Female', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//kA12uJDhiLW6xhTYJEwhMFjJBjb.jpg', 'https://www.imdb.com/name/nm1840659', 'Tehran - Iran'),
(7, 'Keanu Reeves', '1964-09-02', 'Keanu Charles Reeves is a Canadian actor. Reeves is known for his roles in Bill & Ted\'s Excellent Adventure, Speed, Point Break, and The Matrix trilogy as Neo. He has collaborated with major directors such as Stephen Frears (in the 1988 period drama Dangerous Liaisons); Gus Van Sant (in the 1991 independent film My Own Private Idaho); and Bernardo Bertolucci (in the 1993 film Little Buddha). Referring to his 1991 film releases, The New York Times\' critic, Janet Maslin, praised Reeves\' versatility, saying that he ', 'Acting', '0000-00-00', 'male', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//bOlYWhVuOiU6azC4Bw6zlXZ5QTC.jpg', 'https://www.imdb.com/name/nm0000206', 'Beirut, Lebanon'),
(8, 'Halle Berry', '1966-08-14', 'Halle Maria Berry is an American actress and former fashion model. She won an Academy Award for Best Actress in 2002 for her performance in Monster\'s Ball, becoming the first and, as of 2014, the only woman of African-American descent to win an Oscar for a leading role. She is one of the highest paid actresses in Hollywood and has been involved in the production side of several of the films in which she performed. Berry is also a Revlon spokes-model.Before becoming an actress, Berry entered and placed in several beauty contests, including the Miss USA Pageant and Miss World Pageants. Her breakthrough film role was in 1992\'s Boomerang, which led to numerous roles throughout the 1990s, including Introducing Dorothy Dandridge (1999), for which she won the Emmy Award and Golden Globe Award for Best Actress.  Berry reached a higher level of prominence in the 21st Century with prominent action films, including Die Another Day (2002), where she played Bond Girl Jinx.  In addition to her Academy Award win, Berry was awarded a ', 'Acting', '0000-00-00', 'Female', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//AmCXHowNbUXpNf41dNrxNB0naM2.jpg', 'https://www.imdb.com/name/nm0000932', 'Cleveland, Ohio, USA'),
(9, 'Ian McShane', '1942-09-29', 'Ian David McShane (born 29 September 1942) is an English actor. Although he has appeared in numerous films, it is by his television roles that he is generally known, starting with the BBC\'s Lovejoy (1986–94) and particularly in the HBO Western drama Deadwood (2004–06). He starred as King Silas Benjamin in NBC series Kings and as Blackbeard in Pirates of the Caribbean: On Stranger Tides.Description above from the Wikipedia article Ian McShane, licensed under CC-BY-SA, full list of contributors on Wikipedia.', 'Acting', '0000-00-00', 'male', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//f6ugFQRl48BdaLNXou9LI4c8RrD.jpg', 'https://www.imdb.com/name/nm0574534', 'Blackburn, Lancashire, England, UK'),
(10, 'Laurence Fishburne', '1961-07-30', 'An American actor of screen and stage, as well as a playwright, director, and producer. He is perhaps best known for his roles as Morpheus in the Matrix science fiction film trilogy and as singer-musician Ike Turner in the Tina Turner biopic What\'s Love Got to Do With It. He became the first African-American to portray Othello in a motion picture by a major studio when he appeared in Oliver Parker\'s 1995 film adaption of the Shakespeare play. Fishburne has won a Tony Award for Best Featured Actor in a Play for his performance in Two Trains Running (1992) and an Emmy Award for Drama Series Guest Actor for his performance in TriBeCa (1993). Fishburne’s first marriage was to actress to Hajna O. Moss. They had two children together: a son, Langston and a daughter, Montana. Fishburne is now married to actress Gina Torres. They live in Hollywood with their daughter Delilah.', 'Acting', '0000-00-00', 'male', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//8suOhUmPbfKqDQ17jQ1Gy0mI3P4.jpg', 'https://www.imdb.com/name/nm0000401', 'Augusta, Georgia, USA'),
(11, 'Anjelica Huston', '1951-07-08', 'Anjelica Huston (born July 8, 1951) is an American actress. Huston became the third generation of her family to win an Academy Award, for her performance in 1985\'s Prizzi\'s Honor, joining her father, director John Huston, and grandfather, actor Walter Huston. She later was nominated in 1989 and 1990 for her acting in Enemies, a Love Story and The Grifters respectively. Among her roles, she starred as Morticia Addams in The Addams Family (1991) and Addams Family Values (1993), receiving Golden Globe nominations for both. More recently, she is known for her frequent collaborations with director Wes Anderson.Description above from the Wikipedia article Anjelica Huston, licensed under CC-BY-SA, full list of contributors on Wikipedia.', 'Acting', '0000-00-00', 'Female', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//yLB6mIudcINnbm1wcaZ2vYWZTbH.jpg', 'https://www.imdb.com/name/nm0001378', 'Santa Monica, California, USA'),
(12, 'Saïd Taghmaoui', '1973-07-19', 'Saïd Taghmaoui (born July 19, 1973) is a French actor and screenwriter of Moroccan background. One of his defining screen roles was that of Saïd in the award winning 1995 French film La Haine directed by Mathieu Kassovitz.However, Saïd has also appeared in a number of more recent English Language films, with roles such as the U.S.-trained philosophical Iraqi interrogator Captain \'My Main Man\' Saïd in Three Kings, and as ', 'Acting', '0000-00-00', 'male', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//kuxI08YpwQFGweIXK7TELknwexr.jpg', 'https://www.imdb.com/name/nm0846548', 'Sevran, France'),
(13, 'Tom Holland', '1996-06-01', 'Thomas \"Tom\" Stanley Holland (1st June 1996) is an English actor and dancer. He is best known for playing the title role in Billy Elliot the Musical at the Victoria Palace Theatre, London, as well as for starring in the 2012 film The Impossible. In 2015, Holland was cast as Peter Parker / Spider-Man in the Marvel Cinematic Universe. ', 'Acting', '0000-00-00', 'male', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//2qhIDp44cAqP2clOgt2afQI07X8.jpg', 'https://www.imdb.com/name/nm4043618', 'Kingston upon Thames, Surrey, England, UK'),
(14, 'Jake Gyllenhaal', '1980-12-19', 'Jacob Benjamin \"Jake\" Gyllenhaal (born December 19, 1980) is a Swedish-American actor. A member of the Gyllenhaal family and the son of director Stephen Gyllenhaal and screenwriter Naomi Foner, Gyllenhaal began acting as a child with a screen debut in City Slickers (1991), followed by roles in A Dangerous Woman (1993) and Homegrown (1998). His breakthrough performance was as Homer Hickam in October Sky (1999) and he garnered an Independent Spirit Award nomination for Best Male Lead for playing the title character in the indie cult hit Donnie Darko (2001), in which he played a psychologically troubled teenager alongside his older sister…', 'Acting', '0000-00-00', 'male', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//92sBuFC8tWPG7IqGDJNxysT7tIF.jpg', 'https://www.imdb.com/name/nm0350453', 'Los Angeles, California, USA'),
(15, 'Zendaya', '1996-09-01', 'Zendaya Maree Stoermer Coleman, known simply as Zendaya, is an American actress, singer and dancer. She began performing at an early age with the dance group Future Shock Oakland, the California Shakespeare Theater in Orinda, and as part of her studies at the Oakland School for the Arts and Cal Shakes Summer Conservatory Program. While she was in her early teens, she embarked on her entertainment career, graduating from modeling work for Macy\'s and Old Navy to appearing in the video for Kidz Bop\'s version of Katy Perry\'s hit single, ', 'Acting', '0000-00-00', 'Female', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//r3A7ev7QkjOGocVn3kQrJ0eOouk.jpg', 'https://www.imdb.com/name/nm3918035', 'Oakland, California, USA'),
(16, 'Jon Favreau', '1966-10-19', 'Jonathan Favreau (/ˈfævroʊ/; born October 19, 1966) is an American actor, director, producer, and screenwriter.As an actor, he is known for roles in films such as Rudy (1993), Swingers (1996) (which he also wrote), Very Bad Things (1998), Daredevil (2003), The Break-Up (2006), Couples Retreat (2009), and Chef (2014) (which he also wrote and directed).He has additionally directed the films Elf (2003), Zathura: A Space Adventure (2005), Iron Man (2008), Iron Man 2 (2010), Cowboys & Aliens (2011), The Jungle Book (2016), and the upcoming The Lion King (2019) and served as an executive producer on The Avengers (2012), Iron Man 3 (2013), Avengers: Age of Ultron (2015), Avengers: Infinity War (2018) and Avengers: Endgame (2019).  Favreau also portrays Happy Hogan in the Marvel Cinematic Universe and played Pete Becker during season three of the television sitcom Friends. He produces films under his banner, Fairview Entertainment. The company has been credited as co-producers in most of Favreau\'s directorial ventures.Description above from Wikipedia, the free encyclopedia.', 'Directing', '0000-00-00', 'male', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//rOVBKURoR7TrG8MYxTuNUFj3E68.jpg', 'https://www.imdb.com/name/nm0269463', 'Queens, New York, USA'),
(17, 'Samuel L. Jackson', '1948-12-21', 'An American film and television actor and film producer. After Jackson became involved with the Civil Rights Movement, he moved on to acting in theater at Morehouse College, and then films. He had several small roles such as in the film Goodfellas, Def by Temptation, before meeting his mentor, Morgan Freeman, and the director Spike Lee. After gaining critical acclaim for his role in Jungle Fever in 1991, he appeared in films such as Patriot Games, Amos & Andrew, True Romance and Jurassic Park. In 1994 he was cast as Jules Winnfield in Pulp Fiction, and his performance received several award nominations and critical acclaim.Jackson has since appeared in over 100 films including Die Hard with a Vengeance, The 51st State, Jackie Brown, Unbreakable, The Incredibles, Black Snake Moan, Shaft, Snakes on a Plane, as well as the Star Wars prequel trilogy and small roles in Quentin Tarantino\'s Kill Bill Vol. 2 and Inglourious Basterds. He played Nick Fury in Iron Man and Iron Man 2, Thor, the first two of a nine-film commitment as the character for the Marvel Cinematic Universe franchise. Jackson\'s many roles have made him one of the highest grossing actors at the box office. Jackson has won multiple awards throughout his career and has been portrayed in various forms of media including films, television series, and songs. In 1980, Jackson married LaTanya Richardson, with whom he has one daughter, Zoe.Description above from the Wikipedia article Samuel L. Jackson, licensed under CC-BY-SA, full list of contributors on Wikipedia.', 'Acting', '0000-00-00', 'male', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//mXN4Gw9tZJVKrLJHde2IcUHmV3P.jpg', 'https://www.imdb.com/name/nm0000168', 'Washington, D.C., USA'),
(18, 'Marisa Tomei', '1964-12-04', 'Marisa Tomei was born on December 4, 1964, in Brooklyn, New York, to mother Patricia \"Addie\" Tomei, an English teacher and father Gary Tomei, a lawyer. Marisa also has a brother, actor Adam Tomei. As a child, Marisa\'s mother frequently corrected her speech as to eliminate her heavy Brooklyn accent. As a teen, Marisa attended Edward R. Murrow High School and graduated in the class of 1982. She was one year into her college education at Boston University when she dropped out for a co-starring role on the CBS daytime drama As the World Turns (1956). Her role on that show paved the way for her entrance into film: in 1984, she debuted with a bit part in The…', 'Acting', '0000-00-00', 'Female', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//w8qBpRcv04D5eSnnmvRL7PXyW36.jpg', 'https://www.imdb.com/name/nm0000673', 'Brooklyn, New York, USA'),
(19, 'Robert Downey Jr.', '1965-04-04', 'Robert John Downey Jr. (born April 4, 1965) is an American actor and producer. Downey made his screen debut in 1970, at the age of five, when he appeared in his father\'s film Pound, and has worked consistently in film and television ever since. He received two Academy Award nominations for his roles in films Chaplin (1992) and Tropic Thunder (2008).', 'Acting', '0000-00-00', 'male', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//1YjdSym1jTG7xjHSI0yGGWEsw5i.jpg', 'https://www.imdb.com/name/nm0000375', 'Manhattan, New York City, New York, USA'),
(20, 'Chris Evans', '1981-06-13', 'Christopher Robert \"Chris\" Evans (born June 13, 1981) is an American actor and filmmaker. Evans is best known for his superhero roles, as Captain America in the Marvel Cinematic Universe, and as Human Torch in Fantastic Four. In 2015, he made his directorial debut with the romantic drama Before We Go.', 'Acting', '0000-00-00', 'male', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//dm9xs4FjyNFA32zFwVZFRdTM1r.jpg', 'https://www.imdb.com/name/nm0262635', 'Sudbury, Massachusetts, USA'),
(22, 'Mark Ruffalo', '1967-11-22', 'Mark Alan Ruffalo (born November 22, 1967) is an American actor, director, producer and screenwriter. He has worked in films including Eternal Sunshine of the Spotless Mind, Zodiac, Shutter Island, Just Like Heaven, You Can Count on Me and The Kids Are All Right for which he received an Academy Award nomination for Best Supporting Actor.Description above from the Wikipedia article Mark Ruffalo, licensed under CC-BY-SA, full list of contributors on Wikipedia.', 'Acting', '0000-00-00', 'male', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//z3dvKqMNDQWk3QLxzumloQVR0pv.jpg', 'https://www.imdb.com/name/nm0749263', 'Kenosha, Wisconsin, USA'),
(23, 'Scarlett Johansson', '1984-11-22', 'Scarlett Johansson, born November 22, 1984, is an American actress, model and singer. She made her film debut in North (1994) and was later nominated for the Independent Spirit Award for Best Female Lead for her performance in Manny & Lo (1996), garnering further acclaim and prominence with roles in The Horse Whisperer (1998) and Ghost World (2001). She shifted to adult roles with her performances in Girl with a Pearl Earring (2003) and Sofia Coppola\'s Lost in Translation (2003), for which she won a BAFTA award for Best Actress in a Leading Role; both films earned her Golden Globe Award nominations as well.A role in A Love Song for Bobby Long (2004) earned Johansson her third Golden Globe for Best Actress nomination. Johansson garnered another Golden Globe nomination for Best Supporting Actress with her role in Woody Allen\'s Match Point (2005). She has played the Marvel comic book character Black Widow/Natasha Romanoff in Iron Man 2 (2010), The Avengers (2012), and Captain America: The Winter Soldier (2014) and is set to reprise the role in Avengers: Age of Ultron (2015). The 2010 Broadway revival of Arthur Miller\'s A View From the Bridge won Johansson the Tony Award for Best Performance by a Featured Actress in a Play. As a singer, Johansson has released two albums, Anywhere I Lay My Head and Break Up.Johansson is considered one of Hollywood\'s modern sex symbols, and has frequently appeared in published lists of the sexiest women in the world, most notably when she was named the ', 'Acting', '0000-00-00', 'Female', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//tHMgW7Pg0Fg6HmB8Kh8Ixk6yxZw.jpg', 'https://www.imdb.com/name/nm0424060', 'New York City, New York, USA'),
(24, 'Jeremy Renner', '1971-01-07', 'Jeremy Lee Renner (born January 7, 1971, height 5\' 10\" (1,78 m)) is an American actor and musician. Renner appeared in films throughout the 2000s, mostly in supporting roles. He came to prominence in films such as Dahmer (2002), S.W.A.T. (2003), Neo Ned (2005), 28 Weeks Later (2007), The Town (2010), and was nominated for an Academy Award for Best Actor for his starring role in the 2009 Best Picture-winning war thriller The Hurt Locker.', 'Acting', '0000-00-00', 'male', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//g8gheNEdPSXWH5SnjfjTYWj5ziU.jpg', 'https://www.imdb.com/name/nm0719637', 'Modesto, California, USA'),
(25, 'Brie Larson', '1989-10-01', 'An American actress, director, and singer. Larson was home-schooled before she studied acting at the American Conservatory Theater. She began her acting career in television, appearing as a regular on the 2001 sitcom Raising Dad, for which she was nominated for a Young Artist Award.As a teenager, Larson had brief roles in the 2004 films 13 Going on 30 and Sleepover. Her performance in the comedy film Hoot (2006) was praised, and she subsequently played supporting roles in the films Greenberg (2010), Scott Pilgrim vs. the World (2010), 21 Jump Street (2012), and Don Jon (2013). From 2009 to 2011, Larson featured as a rebellious teenager in the television series United States of Tara.Larson\'s breakthrough role came with the independent drama Short Term 12 (2013), for which she received critical acclaim. Further success came in 2015 when she starred in Room, an acclaimed drama based on Emma Donoghue\'s novel of the same name. She won several awards for her portrayal of a troubled mother kidnap victim in the film, including the Academy Award, BAFTA Award, Critic\'s Choice Award, Golden Globe Award, Screen Actors Guild Award and Canadian Screen Award for Best Actress. In 2017, she starred as a war photographer in the adventure film Kong: Skull Island, her highest-grossing release.', 'Acting', '0000-00-00', 'Female', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//4ZgxRd2ADYVm2gd5yQJa1emtMl5.jpg', 'https://www.imdb.com/name/nm0488953', 'Sacramento, California, USA'),
(26, 'Samuel L. Jackson', '1948-12-21', 'An American film and television actor and film producer. After Jackson became involved with the Civil Rights Movement, he moved on to acting in theater at Morehouse College, and then films. He had several small roles such as in the film Goodfellas, Def by Temptation, before meeting his mentor, Morgan Freeman, and the director Spike Lee. After gaining critical acclaim for his role in Jungle Fever in 1991, he appeared in films such as Patriot Games, Amos & Andrew, True Romance and Jurassic Park. In 1994 he was cast as Jules Winnfield in Pulp Fiction, and his performance received several award nominations and critical acclaim.Jackson has since appeared in over 100 films including Die Hard with a Vengeance, The 51st State, Jackie Brown, Unbreakable, The Incredibles, Black Snake Moan, Shaft, Snakes on a Plane, as well as the Star Wars prequel trilogy and small roles in Quentin Tarantino\'s Kill Bill Vol. 2 and Inglourious Basterds. He played Nick Fury in Iron Man and Iron Man 2, Thor, the first two of a nine-film commitment as the character for the Marvel Cinematic Universe franchise. Jackson\'s many roles have made him one of the highest grossing actors at the box office. Jackson has won multiple awards throughout his career and has been portrayed in various forms of media including films, television series, and songs. In 1980, Jackson married LaTanya Richardson, with whom he has one daughter, Zoe.Description above from the Wikipedia article Samuel L. Jackson, licensed under CC-BY-SA, full list of contributors on Wikipedia.', 'Acting', '0000-00-00', 'male', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//mXN4Gw9tZJVKrLJHde2IcUHmV3P.jpg', 'https://www.imdb.com/name/nm0000168', 'Washington, D.C., USA'),
(27, 'Ben Mendelsohn', '1969-04-03', 'An Australian actor, who first rose to prominence in Australia for his role in The Year My Voice Broke (1987) and internationally for his role in the crime drama Animal Kingdom (2010).Since then he has had roles in films such as The Dark Knight Rises (2012), Starred Up (2013), Mississippi Grind (2015), and Rogue One: A Star Wars Story (2016).Mendelsohn starred in the Netflix series Bloodline (2015–2017), for which he has won a Primetime Emmy Award for Outstanding Supporting Actor in a Drama Series from two nominations, and received a Golden Globe nomination.Description above from the Wikipedia article Ben Mendelsohn, licensed under CC-BY-SA, full list of contributors on Wikipedia.', 'Acting', '0000-00-00', 'male', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//7wuqoqwDOMi6k1Y4zNzGPPsiQKy.jpg', 'https://www.imdb.com/name/nm0578853', 'Melbourne, Victoria, Australia'),
(28, 'Jude Law', '1972-12-29', 'An English actor, film producer and director. He began acting with the National Youth Music Theatre in 1987, and had his first television role in 1989. After starring in films directed by Andrew Niccol, Clint Eastwood and David Cronenberg, he was nominated for the Academy Award for Best Supporting Actor in 1999 for his performance in Anthony Minghella\'s The Talented Mr. Ripley. In 2000 he won a Best Supporting Actor BAFTA Award for his work in the film. In 2003, he was nominated for the Academy Award for Best Actor for his performance in another Minghella film, Cold Mountain.In 2006, he was one of the top ten most bankable movie stars in Hollywood. In 2007, he received an Honorary César and he was named a Chevalier of the Ordre des Arts et des Lettres by the French government. In April 2011, it was announced that he would be a member of the main competition jury at the 2011 Cannes Film Festival.Description above from the Wikipedia article Jude Law, licensed under CC-BY-SA, full list of contributors on Wikipedia.', 'Acting', '0000-00-00', 'male', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//4077Cyuo1mw53u1gNjLyQkqeZN0.jpg', 'https://www.imdb.com/name/nm0000179', 'Lewisham, London, England, UK'),
(29, 'Annette Bening', '1958-05-29', 'An American film and television actress. She\'s a four-time Academy Awards nominee for her roles in the feature films The Grifters, American Beauty, Being Julia and The Kids Are All Right, winning Golden Globe Awards for the latter two films.', 'Acting', '0000-00-00', 'Female', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//vVAvoiE6FQ4couqaB0ogaHR6Ef7.jpg', 'https://www.imdb.com/name/nm0000906', 'Topeka, Kansas, USA'),
(30, 'Djimon Hounsou', '1964-04-24', 'A Beninese-American actor and model. As an actor, Hounsou has been nominated for two Academy Awards. Hounsou became a naturalized American citizen in 2007. He was reluctant to renounce his Beninese citizenship and therefore opted to become a dual citizen of both Benin and the United States, effectively rendering him a Beninese-American. Djimon Hounsou was born in Cotonou, Benin, in 1964, to lbertine and Pierre Hounsou. He immigrated to Lyon in France at the age of thirteen with his brother, Edmond. In 1987, he became a model and established a career in Paris. He moved to the U.S. in 1990. One year before obtaining his college degree, he dropped out of school. In the 1989 he appeared in a music video of Straight Up by Paula Abdul. Hounsou\'s film debut was in the 1990 Sandra Bernhard film Without You I’m Nothing, and he has had television parts on Beverly Hills, 90210 and ER and a guest starring role on Alias, but received a larger role in the science fiction film Stargate. His first on-screen appearance was in the 1990 Janet Jackson video “Love Will Never Do (Without You).” He also starred in a 2002 Gap commercial directed by Peter Lindbergh, dancing to a rendition of John Lee Hooker\'s ', 'Acting', '0000-00-00', 'male', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//5Nsd55XnTVAaiyeMfKh0udl8Qyu.jpg', 'https://www.imdb.com/name/nm0005023', 'Cotonou, Benin'),
(31, 'Ahmed Al Fishawy', '1980-02-16', 'Ahmed Farouk AlFishawy grew up amongst some of the top artists in the region. With famed actors Farouk Al Fishawy and Somaya El Alfy as birth parents, it was inevitable for Ahmad AlFishawy to find his calling in the arts. Born on the 16th of February, 1980 Ahmad AlFishawy started his cinematic/TV career very early -making him today an A lister entertainment name in the movie, TV, Music industry. His Production company, Crystal Dog, is currently invested in creating content for the Silver Screens.', 'Acting', '0000-00-00', 'male', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//6wZie8Hp3fxZ9mRsDJUOpI5GMM5.jpg', 'https://www.imdb.com/name/nm0252640', 'Cairo, Egypt'),
(32, 'Ruby', '0000-00-00', ' ', 'Acting', '0000-00-00', '-', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//uJyAFodceYZ8K1hzejSSdQpjBGO.jpg', 'https://www.imdb.com/name/', 'Egypt'),
(33, 'Mohamed Mamdouh', '1981-03-09', 'Mohamed Mamdouh is an Egyptian actor. He started acting on stage, and came to prominence in the early 2010\'s with roles in films like \"Bebo we Beshir\" (Bebo and Beshir) and \"Elfeel El Azraq\" (The Blue Elephant). He also starred in several television series including \"Niran Sadiqa\" (Friendly Fire) and \"Embratoreyyet Min\" (Who\'s Empire).', 'Acting', '0000-00-00', 'male', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//9t3Ac03ySPBWpGws6Qui1pbqUt2.jpg', 'https://www.imdb.com/name/nm4937378', 'Egypt'),
(34, 'Ahmed Malek', '1995-09-29', ' ', 'Acting', '0000-00-00', 'male', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//tAoqptyxozU5DmVPU7mCbfHciwR.jpg', 'https://www.imdb.com/name/nm5972255', 'Egypt'),
(35, 'Asmaa Abou El Yazeed', '0000-00-00', 'An Egyptian actress, studied at the Faculty of Fine Arts, participated in a number of theatrical performances, including Dream Plastic, Laughter of the Years, and the play ', 'Acting', '0000-00-00', 'Female', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//yJrsy7KLn86f01CM4TssTxa3VKq.jpg', 'https://www.imdb.com/name/nm7607890', 'Egypt'),
(36, 'Hana Sheiha', '1985-12-25', 'Egyptian actress. She was born in Lebanon to a Lebanese mother and an Egyptian father, the plastic artist (Ahmed Shiha). She and her sisters (Hala, Rasha, and Maya) worked in art for different periods, but only continued. She began her career by working in television series such as Wa\'a al-Bahad, West Bank and Sunbirds. She also participated in a film series such as ', 'Acting', '0000-00-00', 'Female', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//wLVWybflDcrp8rDWAmovBqbN4qA.jpg', 'https://www.imdb.com/name/nm1555723', 'Egypt'),
(37, 'Donald Glover', '1983-09-25', 'Donald McKinley Glover (born September 25, 1983) is an American actor, writer, comedian, musician and rapper. Glover first came to attention for his work in the sketch group Derrick Comedy and is best known for his role as community college student Troy Barnes on the NBC comedy series Community. Contrary to a persistent rumor, he is not related to actor Danny Glover.', 'Acting', '0000-00-00', 'male', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//36o5mpbQVdxOf9kUxWw7SllOuk.jpg', 'https://www.imdb.com/name/nm2255973', 'Stone Mountain, Georgia, USA'),
(38, 'Beyoncé Knowles', '1981-09-04', 'Beyoncé Giselle Knowles-Carter (born September 4, 1981), often known simply as Beyoncé, is an American R&B and pop recording artist and actress.Born and raised in Houston, Texas, she enrolled in various performing arts schools and was first exposed to singing and dancing competitions as a child. Knowles rose to fame in the late 1990s as the lead singer of the R&B girl group Destiny\'s Child, one of the world\'s best-selling girl groups of all time. During the hiatus of Destiny\'s Child, Knowles released her debut solo album Dangerously in Love (2003), which spawned the number one hits ', 'Acting', '0000-00-00', 'Female', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//9MgDCYBBVBl4lM1DuxNIIbCHlKy.jpg', 'https://www.imdb.com/name/nm0461498', 'Houston, Texas, United States'),
(39, 'James Earl Jones', '1931-01-17', 'James Earl Jones (born January 17, 1931) is a multi-award-winning American actor of theater and film, well known for his distinctive bass voice and for his portrayal of characters of substance, gravitas and leadership. He is known for providing the voice of Darth Vader in the Star Wars franchise and the tagline for CNN.  James Earl Jones was born in Arkabutla, Mississippi, the son of Ruth (née Connolly) and Robert Earl Jones. At the age of five, he moved to Jackson, Michigan, to be raised by his maternal grandparents, but the adoption was traumatic and he developed a stutter so severe he refused to speak aloud. When he moved to Brethren, Michigan in later years a teacher at the Brethren schools started to help him with his stutter. He remained functionally mute for eight years until he reached high school. He credits his high school teacher, Donald Crouch, who discovered he had a gift for writing poetry, with helping him out of his silence.  Jones attended the University of Michigan where he was a pre-med major. While there, he joined the Reserve Officer Training Corps, and excelled. During the course of his studies, Jones discovered he was not cut out to be a doctor. Instead he focused himself on drama, with the thought of doing something he enjoyed, before, he assumed, he would have to go off to fight in the Korean War. After four years of college, Jones left without his degree. In 1953 he found a part-time stage crew job at the Ramsdell Theatre in Manistee, Michigan, which marked the beginning of his acting career. During the 1955–1957 seasons he was an actor and stage manager. He performed his first portrayal of Shakespeare’s Othello in this theater in 1955. After his discharge from the Military, Jones moved to New York, where he attended the American Theatre Wing to further his training and worked as a janitor to earn a living. His first film role was as a young and trim Lt. Lothar Zogg, the B-52 bombardier in Dr. Strangelove or: How I Learned to Stop Worrying and Love the Bomb in 1964. His first big role came with his portrayal of boxer Jack Jefferson in the film version of the Broadway play The Great White Hope, which was based on the life of boxer Jack Johnson. For his role, Jones was nominated Best Actor by the Academy of Motion Picture Arts and Sciences, making him the second African-American male performer (following Sidney Poitier) to receive a nomination. In 1969, Jones participated in making test films for a proposed children\'s television series; these shorts, combined with animated segments were the beginnings of the Sesame Street format. The next year, in the early 1970s, James appeared with Diahann Carroll in the film called Claudine.  While he has appeared in many roles, he is well known as the voice of Darth Vader in the original Star Wars trilogy. Darth Vader was portrayed in costume by David Prowse in the original trilogy, with Jones dubbing Vader\'s dialogue in postproduction due to Prowse\'s strong West Country accent being unsuitable for the role. At his own request, he was originally uncredited for the release of the first two films (he would later be credited for the two in the 1997 re-release).  His other voice roles include Mufasa in the 1994 film Disney animated blockbuster The Lion King, and its direct-to-video sequel, The Lion King II: Simba\'s Pride. He also has done the CNN tagline, ', 'Acting', '0000-00-00', 'male', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//oqMPIsXrl9SZkRfIKN08eFROmH6.jpg', 'https://www.imdb.com/name/nm0000469', 'Arkabutla, Mississippi, USA'),
(40, 'Chiwetel Ejiofor', '1977-07-10', 'Chiwetelu Umeadi \"Chiwetel\" Ejiofor was born on 10 July 1977 in Forest Gate, London. He attended London Academy of Music and Dramatic Art, but had to leave after a year after receiving the roll of Ens, in Steven Spielberg\'s historical drama, \"Amistad\". For his first leading film role in Dirty Pretty Things, he won a British Independent Film Award for best actor. He has portrayed Othello in numerous stage productions including Bloomsbury Theatre, Theatre Royal in Glasgow and Donmar Warehouse. He made his directorial debut in the short film Slapper, which he also wrote. He soon became well known after moving on to bigger roles in \"Inside Man\" (2005)…', 'Acting', '0000-00-00', 'male', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//kq5DDnqqofoRI0t6ddtRlsJnNPT.jpg', 'https://www.imdb.com/name/nm0252230', 'Forest Gate, London, UK'),
(41, 'Alfre Woodard', '1952-11-08', 'Alfre Ette Woodard (born November 8, 1952) is an American film, stage, and television actress. She has been nominated once for an Academy Award and Grammy Awards, 12 times for Emmy Awards (winning four), and has also won a Golden Globe and three Screen Actors Guild Awards. She is known for her role in films such as Cross Creek, Miss Firecracker, Grand Canyon, Passion Fish, Primal Fear, Star Trek: First Contact, Miss Evers\' Boys, K-PAX, Radio, Take the Lead and The Family That Preys.', 'Acting', '0000-00-00', 'Female', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//aCAjUOrV2WG3OaLUvQHVkyk8S2P.jpg', 'https://www.imdb.com/name/nm0005569', 'Tulsa, Oklahoma, USA'),
(42, 'John Oliver', '1977-04-23', '​John Oliver (born 23 April 1977) is a British-born stand-up comedian, actor and writer. He is best known for his work on The Daily Show with Jon Stewart, for which he won an Emmy in 2009, as well as for playing recurring character Professor Ian Duncan on the show Community. He has worked extensively with Andy Zaltzman. In addition to several collaborative stand-up acts, their body of work together includes hundreds of hours worth of satirical podcasts and radio broadcasts, including series such as Political Animal, The Department and The Bugle. He is a permanent resident of the United States and lives in New York City.', 'Acting', '0000-00-00', 'male', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//t1smh9XiGfVof4ep5ZSD8CEFQLk.jpg', 'https://www.imdb.com/name/nm1056659', 'Birmingham - England - UK'),
(43, 'Sophie Turner', '1996-02-21', 'Sophie Turner (born 21 February 1996) is an English actress. Turner made her professional acting debut as Sansa Stark on the HBO fantasy television series Game of Thrones (2011–2019), which brought her international recognition.Turner has also starred in the television film The Thirteenth Tale (2013) and she made her feature film debut in Another Me (2013). She has also starred in the action comedy Barely Lethal (2015) and portrays a young Jean Grey / Phoenix in the X-Men film series.', 'Acting', '0000-00-00', 'Female', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//ed4ajSYdv49j9OF7yMeG8Hznrrt.jpg', 'https://www.imdb.com/name/nm3849842', 'Northampton, Northamptonshire, England'),
(44, 'James McAvoy', '1979-04-21', 'A Scottish stage and screen actor. His best-known work includes the films The Last King of Scotland and Atonement, both of which earned him BAFTA Award nominations, and the TV series Shameless. McAvoy has won the BAFTA Rising Star Award and a BAFTA Scotland award. He has also been nominated for an ALFS Award, a European Film Award, and a Golden Globe award.', 'Acting', '0000-00-00', 'male', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//oPIfGm3mf4lbmO5pWwMvfTt5BM1.jpg', 'https://www.imdb.com/name/nm0564215', 'Port Glasgow, Scotland, UK'),
(45, 'Michael Fassbender', '1977-04-02', 'Michael Fassbender (born 2 April 1977) is a German-born Irish actor. He was born in Heidelberg, Germany, to a German father, Josef, and an Irish mother, Adele (originally from Larne, County Antrim, in Northern Ireland). Michael was raised in the town of Killarney, Co. Kerry, in south-west Ireland, where his family moved to when he was two years old. His parents ran a restaurant (his father is a chef). Fassbender is based in London, England, and is known for his roles in the films Inglourious Basterds (2009), X-Men: First Class (2011), Shame (2011), 12 Years a Slave (2013) and Steve Jobs (2015). First language is English and second is German.', 'Acting', '0000-00-00', 'male', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//oexNPLumoFpazzzUqzBSDDYiUg1.jpg', 'https://www.imdb.com/name/nm1055413', 'Heidelberg, Baden-Wurttemburg, Germany'),
(46, 'Jennifer Lawrence', '1990-08-15', 'Jennifer Shrader Lawrence (born August 15, 1990) is an American actress.  Her first major role was as a lead cast member on TBS\'s The Bill Engvall Show (2007–2009) and she subsequently appeared in the independent films The Burning Plain (2008) and Winter\'s Bone (2010), for which she received nominations for the Academy Award, Golden Globe Award, Satellite Award, Independent Spirit Award, and Screen Actors Guild Award for Best Actress. At age 20, she was the second-youngest actress ever to be nominated for the Academy Award for Best Actress. At age 22, her performance in the romantic comedy Silver Linings Playbook (2012) earned her the Academy Award, Golden Globe Award, Screen Actors Guild Award, Satellite Award and the Independent Spirit Award for Best Actress, amongst other accolades, making her the youngest person ever to be nominated for two Academy Awards for Best Actress and the second-youngest Best Actress winner.Lawrence is also known for playing Raven Darkhölme / Mystique in the 2011 film X-Men: First Class, a role she will reprise in X-Men: Days of Future Past in 2014. In 2012, she achieved international recognition starring as the heroine Katniss Everdeen in The Hunger Games, an adaptation of Suzanne Collins\' best-selling novel of the same name. Her performance in the film garnered her notable critical praise and marked her as the highest-grossing action heroine of all time.Lawrence\'s performances thus far have prompted Rolling Stone to call her ', 'Acting', '0000-00-00', 'Female', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//naZyy9IqAQDaAbr1kYShLdg6aPR.jpg', 'https://www.imdb.com/name/nm2225369', 'Indian Hills, Kentucky, USA'),
(47, 'Jessica Chastain', '1977-03-24', 'Jessica Chastain (born March 24, 1977) is an American theater, film and television actress. She played guest roles in several television shows before making her feature film debut with the 2008 independent film Jolene.In 2011, Chastain gained wide public recognition for her starring roles in seven film releases; for her performance in The Help she received Best Supporting Actress nominations at the Academy Award, Golden Globe, BAFTA, and Screen Actors Guild Award ceremonies. In 2012, Time magazine featured her as one of the ', 'Acting', '0000-00-00', 'Female', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//lodMzLKSdrPcBry6TdoDsMN3Vge.jpg', 'https://www.imdb.com/name/nm1567113', 'Southern California, California, USA'),
(48, 'Nicholas Hoult', '1989-12-07', 'Nicholas Caradoc Hoult (born 7 December 1989) is an English actor, best known for the role as Marcus Brewer in the 2002 film About a Boy and as Tony Stonem in the E4 BAFTA winning television series, Skins.Description above from the Wikipedia article Nicholas Hoult, licensed under CC-BY-SA,full list of contributors on Wikipedia.', 'Acting', '0000-00-00', 'male', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//h1gXgpuXERZTVhxMdjT7uvXIyq6.jpg', 'https://www.imdb.com/name/nm0396558', 'Wokingham, England, UK'),
(49, 'Chris Hemsworth', '1983-08-11', 'Chris Hemsworth (born 11 August 1983) is an Australian actor. He is best known for his roles as Kim Hyde in the Australian TV series Home and Away (2004) and as Thor in the Marvel Cinematic Universe films Thor (2011), The Avengers (2012), Thor: The Dark World (2013) and Avengers: Age of Ultron (2015). He has also appeared in the science fiction action film Star Trek(2009), the thriller adventure A Perfect Getaway (2009), the horror comedy The Cabin in the Woods (2012), the dark fantasy action film Snow White and the Huntsman (2012), the war film Red Dawn (2012) and the biographical sports drama film Rush (2013).Description above from the Wikipedia article Chris Hemsworth, licensed under CC-BY-SA, full list of contributors on Wikipedia.', 'Acting', '0000-00-00', 'male', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//lrhth7yK9p3vy6p7AabDUM1THKl.jpg', 'https://www.imdb.com/name/nm1165110', 'Melbourne, Victoria, Australia'),
(50, 'Tessa Thompson', '1983-10-03', 'Tessa Thompson is an American film and television actress, best known for her roles as Valkyrie in the feature films Thor: Ragnarok and Avengers: Endgame, Jackie Cook on the TV series Veronica Mars, and Charlotte Hale on the HBO series Westworld.', 'Acting', '0000-00-00', 'Female', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//3POwFJPt9Mn7UqktzgoRQKjnfwp.jpg', 'https://www.imdb.com/name/nm1935086', 'Los Angeles, California, USA'),
(51, 'Liam Neeson', '1952-06-07', 'An Irish actor who has been nominated for an Oscar, a BAFTA and three Golden Globe Awards. He has starred in a number of notable roles including Oskar Schindler in Schindler\'s List, Michael Collins in Michael Collins, Peyton Westlake in Darkman, Jean Valjean in Les Misérables, Qui-Gon Jinn in Star Wars Episode I: The Phantom Menace, Alfred Kinsey in Kinsey, Ras Al Ghul in Batman Begins and the voice of Aslan in The Chronicles of Narnia film series. He has also starred in several other notable films, from major Hollywood studio releases (ie. Excalibur, The Dead Pool, Nell, Rob Roy, The Haunting, Love Actually, Kingdom of Heaven, Taken, Clash of the Titans, The A-Team, Unknown) to smaller arthouse films (ie. Deception, Breakfast on Pluto, Chloe). He was born in Ballymena, County Antrim, Northern Ireland and educated at Saint Patrick\'s College, Ballymena Technical College and Queen\'s University Belfast. He moved to Dublin after university to further his acting career, joining the renowned Abbey Theatre. In the early 1990s, he moved again to the United States, where the wide acclaim for his performance in Schindler\'s List led to more high-profile work. He is widowed and lives in New York with his two sons.Description above from the Wikipedia article Liam Neeson, licensed under CC-BY-SA, full list of contributors on Wikipedia.', 'Acting', '0000-00-00', 'male', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//9mdAohLsDu36WaXV2N3SQ388bvz.jpg', 'https://www.imdb.com/name/nm0000553', 'Ballymena, County Antrim, Northern Ireland, UK'),
(52, 'Rebecca Ferguson', '1983-10-19', 'Rebecca Louisa Ferguson Sundström (born 19 October 1983), known professionally as Rebecca Ferguson, is a Swedish actress. She played the lead role in the soap-opera Nya tider and later played Chrissy in the Swedish-American soap Ocean Ave.. Ferguson has also appeared in movies, including A One-Way Trip to Antibes, the horror film Strandvaskaren and the upcoming film Vi alongside Gustaf Skarsgård. Ferguson\'s role in The White Queen has been met with some praise. Ferguson grew up in the Vasastaden district in central Stockholm. Today she lives with her boyfriend and young child in the seaside town of Simrishamn, on the Swedish south coast. Ferguson has said she wanted to get away from city life and the public spotlight following her soap opera success. In Simrishamn, she started drifting away from acting, ran an Argentine dance studio, and also worked on several short film art projects. Swedish director Richard Hobert spotted her at the town market in 2011. He recognized her and this led to her starring in his film A One - Way to Antibes.', 'Acting', '0000-00-00', 'Female', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//dbIS4S32rrIJyEysx7huT6ZAmjN.jpg', 'https://www.imdb.com/name/nm0272581', 'Stockholm, Sweden'),
(53, 'Emma Thompson', '1959-04-15', 'Emma Thompson (born 15 April 1959) is a British actress, comedian and screenwriter. Her first major film role was in the 1989 romantic comedy The Tall Guy. In 1992, Thompson won multiple acting awards, including an Academy Award and a BAFTA Award for Best Actress, for her performance in the British drama Howards End. The following year Thompson garnered dual Academy Award nominations, as Best Actress for The Remains of the Day and as Best Supporting Actress for In the Name of the Father. In 1995, Thompson scripted and starred in Sense and Sensibility, a film adaptation of the Jane Austen novel of the same name, which earned her an Academy Award for Best Adapted Screenplay and a BAFTA Award for Best Actress in a Leading Role. Other notable film and television credits have included the Harry Potter film series, Wit (2001), Love Actually (2003), Angels in America (2003), Nanny McPhee (2005), Stranger than Fiction (2006), Last Chance Harvey (2008), An Education (2009), and Nanny McPhee and the Big Bang (2010). Thompson is also a patron of the Refugee Council and President of the Teaching Awards.Description above from the Wikipedia article Emma Thompson, licensed under CC-BY-SA, full list of contributors on Wikipedia.', 'Acting', '0000-00-00', 'Female', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//cWTBHN8kLf6yapxiaQD9C6N1uMw.jpg', 'https://www.imdb.com/name/nm0000668', 'Paddington, London, England'),
(54, 'Rafe Spall', '1983-03-10', 'Rafe Joseph Spall is an English actor on both stage and screen. He is perhaps best known for his roles in BBC\'s The Shadow Line, Channel 4\'s Pete versus Life, One Day, Anonymous, and the Ridley Scott film Prometheus. He played writer Yann Martel in the 2012 film Life of Pi.', 'Acting', '0000-00-00', 'male', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//7ucsDEWvcMU4SpxtZEaYErPpXHh.jpg', 'https://www.imdb.com/name/nm1245863', 'East Dulwich, London, England, UK'),
(55, 'Amir Karara', '1977-10-10', 'Amir Karara is an Egyptian actor and broadcaster. He rose to fame through hosting television contest shows like Star Maker and The Deal. He played in the national volley ball team, in a lot of national and international games. He has a degree in tourism from Cairo University. His most famous television roles include', 'Acting', '0000-00-00', 'male', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//bYq4fYM75gjxcPMqrlaHq6pRGO4.jpg', 'https://www.imdb.com/name/nm4020580', 'Egypt'),
(56, 'Scott Adkins', '1976-06-17', 'An English actor and martial artist who is perhaps best known for playing Boyka in Undisputed II: Last Man Standing and Undisputed III: Redemption and Bradley Hume in Holby City and Ed Russell in Mile High. Adkins has also appeared in Dangerfield, Hollyoaks, The Tournament and many other TV series as well as many films.Description above from the Wikipedia article Scott Adkins, licensed under CC-BY-SA, full list of contributors on Wikipedia', 'Acting', '0000-00-00', 'male', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//n1L8652hJAKi5l2sdrZ07oZJmos.jpg', 'https://www.imdb.com/name/nm0012078', 'Sutton Coldfield, West Midlands, England, UK'),
(57, 'Mahmoud Hemida', '1953-12-07', 'Mahmoud Hemida is an Egyptian film and television actor.', 'Acting', '0000-00-00', 'male', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//8uSJfakEstaPOBqCtn1oIzJm7VZ.jpg', 'https://www.imdb.com/name/nm0375990', 'Cairo, Egypt'),
(58, 'Ghada Abdel Razek', '1965-07-06', ' ', 'Acting', '0000-00-00', 'Female', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//xLru28L0E03luYJ3lq72vudR8L1.jpg', 'https://www.imdb.com/name/nm1728178', 'Egypt');
INSERT INTO `cast` (`ID`, `name`, `date`, `details`, `job`, `deathday`, `gender`, `img`, `IMDB`, `place`) VALUES
(59, 'Rogina', '1973-04-16', 'Egyptian actress, graduated from the High Institute of Dramatic Arts yet never played a stage role. “Al-‘aaela i.e. The family”, “Shayy men al-khawf i.e. Some fear”, “Awraak Mesreyya i.e. Egyptian documents” and “Yawmmeyyaat zowg mo’aasser i.e. Diaries of a modern husband” are among her TV series. Roujina is married to actor and director Ashraf Zaky.', 'Acting', '0000-00-00', 'Female', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//xZvMc1FarVxUuAhpDSef5SuYn2R.jpg', 'https://www.imdb.com/name/nm6062925', 'Egypt'),
(60, 'Eman El-Assy', '1985-08-28', 'Pre stardom, Eman El Aassy studied Business Administration for she had no intention to join the cinema world. Her introduction though to the movie industry came by sheer coincidence when she took part of a photo shoot session that ended with the photographer’s admiration with one of her shots, asking her permission to publish it in a female magazine. Eman agreed, for the shot was a respectable one that expressed and reflected who she truly was. The shot was later published as magazine cover that was seen by renowned director Khaled Bahgat, nominating her to take part in the TV series ‘Ams la yamoot’, co-starring with ‘Raghda’and ’Ryad Al Kholy’. The nomination was based on Aasi’s resemblance in looks with ‘Raghda’ whom she was to play her daughter in the series. Eman was once again nominated by director Haitham Hakky to cast in the TV series ‘Ragol w emraatan’ co-starring with Samira Ahmed. Eman then took part in the TV series ‘Ahlam fel Bawaba’, playing both Dalal Abd El Aziz and Farouk El Fishawy’s daughter. She also took part in the TV series ‘Daawt Farah’ to co-star once again with Samira Ahmed. Her golden opportunity came, when director Rabab Hussien nominated her to co-star with Nour El Sherif in the renowned TV series ‘Hadret El Motaham Abby’, where Hussien insisted due to her absolute conviction and belief in Eman’s talent to wait for Eman until she finishes her busy schedule at the time to take part of her hit series.', 'Acting', '0000-00-00', 'Female', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//u4NlXA9ncwWBE39p4OiS1OVVx7Q.jpg', 'https://www.imdb.com/name/nm3779062', 'Cairo, Egypt'),
(61, 'Gwyneth Paltrow', '1972-09-27', 'Paltrow made her acting debut on stage in 1990 and started appearing in films in 1991. She gained early notice for her work in films such as Se7en (1995), Emma (1996), in which she played the title role, and Sliding Doors (1998). She garnered worldwide recognition through her performance in Shakespeare in Love (1998), for which she won the Academy Award for Best Actress, a Golden Globe Award and two Screen Actors Guild Awards, for Outstanding Lead Actress and as a member of the Outstanding Cast. Since then, Paltrow has portrayed supporting as well as lead roles in films such as The Talented Mr. Ripley (1999), Shallow Hal (2001) and Proof (2005), for which she earned a Golden Globe nomination as Best Actress in Motion Picture Drama. In 2008, she appeared in the highest grossing movie of her career, the superhero film Iron Man, and then reprised her role as Pepper Potts in its sequel, Iron Man 2 (2010). Paltrow has been the face of Estée Lauder\'s Pleasures perfume since 2005.', 'Acting', '0000-00-00', 'Female', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//uSidH77gLyon3Zpg6y1GxpKJMdZ.jpg', 'https://www.imdb.com/name/nm0000569', 'Los Angeles, California, USA'),
(62, 'Don Cheadle', '1964-11-29', 'An American film actor as well as producer. Cheadle first received widespread notice for his portrayal of Mouse Alexander in the film Devil in a Blue Dress, for which he won Best Supporting Actor awards from the Los Angeles Film Critics Association and the National Society of Film Critics and was nominated for similar awards from the Screen Actors Guild and the NAACP Image Awards. Following soon thereafter was his performance in the title role of the 1996 HBO TV movie, Rebound: The Legend of Earl ', 'Acting', '0000-00-00', 'male', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//b1EVJWdFn7a75qVYJgwO87W2TJU.jpg', 'https://www.imdb.com/name/nm0000332', 'Kansas City, Missouri, USA '),
(63, 'Guy Pearce', '1967-10-05', 'Guy Edward Pearce (born 5 October 1967) is an English-born Australian actor and musician, known for his roles as Leonard Shelby in Christopher Nolan\'s Memento, Lieutenant Ed Exley in the film L.A. Confidential, a drag queen in the cult film The Adventures of Priscilla, Queen of the Desert, Mike Young in the popular Australian television series Neighbours and King Edward VIII (', 'Acting', '0000-00-00', 'male', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//vTqk6Nh3WgqPubkS23eOlMAwmwa.jpg', 'https://www.imdb.com/name/nm0001602', 'Ely, Cambridgeshire, England, UK'),
(64, 'Rebecca Hall', '1982-05-03', 'An English actress. In 2003, Hall won the Ian Charleson Award for her debut stage performance in a production of Mrs. Warren\'s Profession. She has appeared in three high-profile films: The Prestige, Vicky Cristina Barcelona (for which she was nominated for a Golden Globe in the Best Actress in a Motion Picture – Musical or Comedy category), and The Town. On 6 June 2010, she won the Supporting Actress BAFTA for her portrayal of Paula Garland in the 2009 Channel 4 production Red Riding: In the Year of Our Lord 1974.Description above from the Wikipedia article Rebecca Hall, licensed under CC-BY-SA, full list of contributors on Wikipedia.', 'Acting', '0000-00-00', 'Female', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//kpKck3ENK9e6XPrcCWIU9GEZr15.jpg', 'https://www.imdb.com/name/nm0356017', 'London, England, UK'),
(65, 'Nikolaj Coster-Waldau', '1970-07-27', 'Nikolaj Coster-Waldau is a Danish actor. He graduated from the Danish National School of Performing Arts in Copenhagen in 1993. Coster-Waldau\'s breakthrough performance in Denmark was his role in the film Nightwatch. Wikipedia', 'Acting', '0000-00-00', 'male', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//qDCSP0CiCQIQwEzZJoH6NX5FdsT.jpg', 'https://www.imdb.com/name/nm0182666', 'Rudkobing, Denmark'),
(66, 'Carice van Houten', '1976-09-05', 'Carice Anouk van Houten, born on September 5, 1976, is a Dutch stage and film actress. She won three Golden Calves for her roles in Suzy Q (1999), Undercover Kitty (2001) and Black Book (2006). Her role in Black Book launched her international career. She acted in the American films Valkyrie (2008), and Repo Men (2010).Description above from the Wikipedia article Carice van Houten, licensed under CC-BY-SA, full list of contributors on Wikipedia.', 'Acting', '0000-00-00', 'Female', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//u6iV3URlvP8P7bjFE8AMScsk8pW.jpg', 'https://www.imdb.com/name/nm0396924', 'Leiderdorp, Zuid-Holland, Netherlands'),
(67, 'Eriq Ebouaney', '1967-10-03', 'From Wikipedia, the free encyclopedia.Eriq Ebouaney is a French film actor. He is best known for his portrayal as the Congolese President Patrice Lumumba in the 2000 film Lumumba, as ', 'Acting', '0000-00-00', 'male', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//1tyJreHjH0oVt2innMAWbHNMl40.jpg', 'https://www.imdb.com/name/nm0248254', 'Angers, Maine-et-Loire, France'),
(68, 'Mohammed Azaay', '0000-00-00', ' ', 'Acting', '0000-00-00', '-', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2/', 'https://www.imdb.com/name/nm0044074', ' '),
(69, 'Younes Bachir', '0000-00-00', ' ', 'Acting', '0000-00-00', 'male', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//bZoVjw8E0OWhNPtgTZ51mo3Vu0Q.jpg', 'https://www.imdb.com/name/nm1322180', ' '),
(70, 'Zachary Levi', '1980-09-29', 'An American television actor, director, and singer known for the roles of Kipp Steadman in Less than Perfect, Chuck Bartowski in Chuck, and Flynn Rider in Tangled.Description above from the Wikipedia article Zachary Levi, licensed under CC-BY-SA, full list of contributors on Wikipedia.', 'Acting', '0000-00-00', 'male', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//1W8L3kEMMPF9umT3ZGaNIiCYKfZ.jpg', 'https://www.imdb.com/name/nm1157048', 'Lake Charles, Louisiana, USA'),
(71, 'Asher Angel', '2002-09-06', 'An American actor. He is best known for his roles as Jonah Beck on Disney\'s Andi Mack and Billy Batson on Shazam (2019).', 'Acting', '0000-00-00', 'male', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//l35dA6bF2JmpDsiii8GTW8eUDLP.jpg', 'https://www.imdb.com/name/nm4755508', 'Paradise Valley, Phoenix, Arizona, USA'),
(72, 'Mark Strong', '1963-08-05', 'A British actor, who played Jim Prideaux in the 2011 remake of Tinker Tailor Soldier Spy (2011), is often cast as cold, calculating villains. But before he became a famous actor, he intended to pursue a career in law. Strong was born Marco Giuseppe Salussolia on 30 August, 1963 in London, England, to an Austrian mother and an Italian father. His father left the family not long after he was born, and his mother worked as an au pair to raise the boy on her own. Strong\'s mother had his name legally changed when he was young in order to help him better assimilate with his peers. Although Americans are most familiar with Strong\'s roles as Sinestro in Green Lantern (2011), mob boss Frank D\'Amico in Kick-Ass (2010), and Lord Blackthorn in Sherlock Holmes (2009), British audiences know him from his long history as a television actor. He also starred in as numerous British stage productions, including plays at the Royal National Theatre and the RSC.  His most prominent television parts include Prime Suspect 3 (1993) (TV) and Prime Suspect 6: The Last Witness (2003) (TV) as Inspector Larry Hall, and starring roles in the BBC Two dramas ', 'Acting', '0000-00-00', 'male', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//63AwQg1hz4KQlStZDufhwJdLmT5.jpg', 'https://www.imdb.com/name/nm0835016', 'London, England, UK'),
(73, 'Jack Dylan Grazer', '2003-09-03', 'An American actor. He is best known for his role as Eddie Kaspbrak in the feature film version of Stephen King\'s It, and for also portraying young Alex Riley in the CBS series Me, Myself, and I.', 'Acting', '0000-00-00', 'male', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//q3eF91Q7A3t5GFB5N0S7A1OSvV0.jpg', 'https://www.imdb.com/name/', '	Los Angeles, CA, USA'),
(74, 'Faithe Herman', '2007-12-27', 'Faithe Herman is an American film and television child actress.', 'Acting', '0000-00-00', 'Female', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//9BnLbO7HqauDxJMH4V6L1mjNglI.jpg', 'https://www.imdb.com/name/nm7968936', 'San Diego, California, USA');

-- --------------------------------------------------------

--
-- Table structure for table `episodes`
--

CREATE TABLE `episodes` (
  `ID` int(11) NOT NULL,
  `series_id` int(11) NOT NULL,
  `duration` varchar(15) NOT NULL,
  `link_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `details` longtext NOT NULL,
  `duration` varchar(255) NOT NULL,
  `released_date` date NOT NULL,
  `type` text NOT NULL,
  `img_link` varchar(255) NOT NULL,
  `movie_page_link` varchar(255) NOT NULL,
  `IMDB_link` varchar(255) NOT NULL,
  `production_comp` varchar(255) NOT NULL,
  `rate` double NOT NULL,
  `votes_num` int(11) NOT NULL,
  `movie_lang` tinytext NOT NULL,
  `TMDB_link` varchar(255) NOT NULL,
  `trailer` varchar(300) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`ID`, `name`, `details`, `duration`, `released_date`, `type`, `img_link`, `movie_page_link`, `IMDB_link`, `production_comp`, `rate`, `votes_num`, `movie_lang`, `TMDB_link`, `trailer`, `user_id`) VALUES
(1, 'Aladdin', 'A kindhearted street urchin named Aladdin embarks on a magical adventure after finding a lamp that releases a wisecracking genie while a power-hungry Grand Vizier vies for the same lamp that has the power to make their deepest wishes come true.', '02:10:00', '2019-05-22', 'Adventure,Fantasy,Romance,Comedy,Family,', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//3iYQTLGoy7QnjcUYRJy4YrAgGvp.jpg', 'https://movies.disney.com/aladdin-2019', 'https://www.imdb.com/title/tt6139732/', 'Walt Disney Pictures,Lin Pictures,Rideback,Marc Platt Productions,Hurwitz Creative,', 7.1, 2265, 'en', 'https://www.themoviedb.org/movie/420817-aladdin?language=en-US', 'https://www.youtube.com/watch?v=lD-NcoXJbsU', 2),
(2, 'John Wick: Chapter 3 – Parabellum', 'Super-assassin John Wick returns with a $14 million price tag on his head and an army of bounty-hunting killers on his trail. After killing a member of the shadowy international assassin’s guild, the High Table, John Wick is excommunicado, but the world’s most ruthless hit men and women await his every turn.', '02:11:00', '2019-05-15', 'Crime,Action,Thriller,', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//ziEuG1essDuWuC5lpWUaw1uXY2O.jpg', 'https://www.johnwick.movie', 'https://www.imdb.com/title/tt6146586/', 'Lionsgate,Summit Entertainment,Thunder Road Pictures,87Eleven Productions,', 7.2, 1542, 'en', 'https://www.themoviedb.org/movie/458156-john-wick-chapter-3?language=en-US', 'https://www.youtube.com/watch?v=pU8-7BX9uxs&t=52s', 2),
(3, 'Spider-Man: Far from Home', 'Peter Parker and his friends go on a summer trip to Europe. However, they will hardly be able to rest - Peter will have to agree to help Nick Fury uncover the mystery of creatures that cause natural disasters and destruction throughout the continent.', '02:09:00', '2019-06-28', 'Action,Adventure,Science Fiction,', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//rjbNpRMoVvqHmhmksbokcyCr7wn.jpg', 'https://www.marvel.com/movies/spider-man-far-from-home', 'https://www.imdb.com/title/tt6320628/', 'Sony Pictures,Columbia Pictures,Marvel Studios,', 7.8, 1989, 'en', 'https://www.themoviedb.org/movie/429617-spider-man-far-from-home?language=en-US', 'https://www.youtube.com/watch?v=Nt9L1jCKGnE', 2),
(4, 'Avengers: Endgame', 'After the devastating events of Avengers: Infinity War, the universe is in ruins due to the efforts of the Mad Titan, Thanos. With the help of remaining allies, the Avengers must assemble once more in order to undo Thanos\' actions and restore order to the universe once and for all, no matter what consequences may be in store.', '03:01:00', '2019-04-24', 'Adventure,Science Fiction,Action,', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//or06FN3Dka5tukK1e9sl16pB3iy.jpg', 'https://www.marvel.com/movies/avengers-endgame', 'https://www.imdb.com/title/tt4154796/', 'Marvel Studios,', 8.4, 7772, 'en', 'https://www.themoviedb.org/movie/299534-avengers-endgame?language=en-US', 'https://www.youtube.com/watch?v=TcMBFSGVi1c&t=2s', 2),
(5, 'Captain Marvel', 'The story follows Carol Danvers as she becomes one of the universe’s most powerful heroes when Earth is caught in the middle of a galactic war between two alien races. Set in the 1990s, Captain Marvel is an all-new adventure from a previously unseen period in the history of the Marvel Cinematic Universe.', '02:04:00', '2019-03-06', 'Action,Adventure,Science Fiction,', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//AtsgWhDnHTq68L0lLsUrCnM7TjG.jpg', 'https://www.marvel.com/movies/captain-marvel', 'https://www.imdb.com/title/tt4154664/', 'Marvel Studios,Walt Disney Pictures,Animal Logic,', 7, 6387, 'en', 'https://www.themoviedb.org/movie/299537-captain-marvel?language=en-US', 'https://www.youtube.com/watch?v=0LHxvxdRnYc', 2),
(6, 'عيار ناري', 'After a clash between a group of demonstrators and the security forces, one of the bodies of this clash is returned to the morgue with seven other bodies. The forensic doctor, Yassin Al-Manstarli, writes his medical report after examining the body and states that the victim was shot at close range, unlike the other bodies and the problems begins when this medical report leaks to the media.', '01:38:00', '2018-10-03', 'Crime,', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//k9qkdCZyMOLQY8tuz1ehntAAL8m.jpg', '', 'https://www.imdb.com/title/tt8098636/', '', 6.5, 1, 'ar', 'https://www.themoviedb.org/movie/545514?language=en-US', 'https://www.youtube.com/watch?v=4UfnRjd0HV8', 2),
(7, 'The Lion King', 'Simba idolises his father, King Mufasa, and takes to heart his own royal destiny. But not everyone in the kingdom celebrates the new cub\'s arrival. Scar, Mufasa\'s brother—and former heir to the throne—has plans of his own. The battle for Pride Rock is ravaged with betrayal, tragedy and drama, ultimately resulting in Simba\'s exile. With help from a curious pair of newfound friends, Simba will have to figure out how to grow up and take back what is rightfully his.', '01:58:00', '2019-07-12', 'Adventure,Animation,Family,Drama,Action,', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//dzBtMocZuJbjLOXvrl4zGYigDzh.jpg', 'https://movies.disney.com/the-lion-king-2019', 'https://www.imdb.com/title/tt6105098/', 'Walt Disney Pictures,Fairview Entertainment,', 6.8, 306, 'en', 'https://www.themoviedb.org/movie/420818-the-lion-king', 'https://www.youtube.com/watch?v=vXvtBVidecc', 2),
(8, 'Dark Phoenix', 'The X-Men face their most formidable and powerful foe when one of their own, Jean Grey, starts to spiral out of control. During a rescue mission in outer space, Jean is nearly killed when she\'s hit by a mysterious cosmic force. Once she returns home, this force not only makes her infinitely more powerful, but far more unstable. The X-Men must now band together to save her soul and battle aliens that want to use Grey\'s new abilities to rule the galaxy.', '01:54:00', '2019-06-05', 'Science Fiction,Action,', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//kZv92eTc0Gg3mKxqjjDAM73z9cy.jpg', 'http://darkphoenix.com', 'https://www.imdb.com/title/tt6565702/', 'The Donners\' Company,20th Century Fox,Genre Films,Bad Hat Harry Productions,Marvel Entertainment,Kinberg Genre,', 6.2, 1211, 'en', 'https://www.themoviedb.org/movie/320288-dark-phoenix?language=en-US', 'https://www.youtube.com/watch?v=1-q8C_c-nlM', 2),
(9, 'Men in Black: International', 'The Men in Black have always protected the Earth from the scum of the universe. In this new adventure, they tackle their biggest, most global threat to date: a mole in the Men in Black organization.', '01:55:00', '2019-06-12', 'Action,Comedy,Science Fiction,Adventure,', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//dPrUPFcgLfNbmDL8V69vcrTyEfb.jpg', 'https://www.meninblack.com', 'https://www.imdb.com/title/tt2283336/', 'Amblin Entertainment,Parkes+MacDonald Image Nation,Columbia Pictures,Sony Pictures,', 6, 483, 'en', 'https://www.themoviedb.org/movie/479455-men-in-black-international?language=en-US', 'https://www.youtube.com/watch?v=BV-WEb2oxLk', 2),
(10, 'حرب كرموز', 'During the 1940s, a girl was raped by a group of English soldiers, and three young Egyptians retaliate. The British soldier is being held at the Karamouz police station in Alexandria, headed by General Youssef al-Masri (Amir Karara).  General Frank Adams demands that the English soldier be handed over to him, but Yusuf refuses. The British army is led to block the police station, and enters a fierce confrontation with General Yusuf and the rest of the Egyptian soldiers.', '01:50:33', '2018-06-15', 'Action,Thriller,History,Crime,War,', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//qqJ7Ekyt3AuWBfn00B3S3Y4UTe5.jpg', '', 'https://www.imdb.com/title/tt8351882/', '', 7.6, 5, 'ar', 'https://www.themoviedb.org/movie/521784-karmouz-war?language=en-US', 'https://www.youtube.com/watch?v=qAfMV9neAA0', 2),
(12, 'Iron Man 3', 'When Tony Stark\'s world is torn apart by a formidable terrorist called the Mandarin, he starts an odyssey of rebuilding and retribution.', '02:11:00', '2013-04-18', 'Action,Adventure,Science Fiction,', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//7XiGqZE8meUv7L4720L0tIDd7gO.jpg', 'https://www.marvel.com/movies/iron-man-3', 'https://www.imdb.com/title/tt1300854/', 'Marvel Studios,', 6.9, 14424, 'en', 'https://www.themoviedb.org/movie/68721-iron-man-3?language=en-US', 'https://www.youtube.com/watch?v=oYSD2VQagc4', 2),
(13, 'Domino', 'Seeking justice for his partner’s murder by an ISIS member, a Copenhagen police officer finds himself caught in a cat and mouse game with a duplicitous CIA agent who is using the killer as a pawn to trap other ISIS members.', '01:29:00', '2019-05-31', 'Crime,Thriller,', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//4ExrDZRhhmZkveXMjUzywc6266q.jpg', '', 'https://www.imdb.com/title/tt3282076/', 'N279 Entertainment,Backup Media,Mollywood,', 4.4, 26, 'en', 'https://www.themoviedb.org/movie/455957-domino?language=en-US', 'https://www.youtube.com/watch?v=MZv4Fvv5-Hw', 2),
(14, 'Shazam!', 'A boy is given the ability to become an adult superhero in times of need with a single magic word.', '02:12:00', '2019-03-23', 'Action,Comedy,Fantasy,', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2//xnopI5Xtky18MPhK40cZAGAOVeV.jpg', 'http://www.shazammovie.com', 'https://www.imdb.com/title/tt0448115/', 'DC Entertainment,DC Comics,New Line Cinema,Warner Bros. Pictures,The Safran Company,Seven Bucks Productions,', 7.1, 2612, 'en', 'https://www.themoviedb.org/movie/287947-shazam?language=en-US', 'https://www.youtube.com/watch?v=-oD7B7oiBtw', 2);

-- --------------------------------------------------------

--
-- Table structure for table `movies_cast`
--

CREATE TABLE `movies_cast` (
  `movie_id` int(11) NOT NULL,
  `cast_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movies_cast`
--

INSERT INTO `movies_cast` (`movie_id`, `cast_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(3, 13),
(3, 14),
(3, 15),
(3, 16),
(3, 17),
(3, 18),
(4, 19),
(4, 20),
(4, 22),
(4, 23),
(4, 24),
(4, 49),
(5, 17),
(5, 25),
(5, 27),
(5, 28),
(5, 29),
(5, 30),
(6, 31),
(6, 32),
(6, 33),
(6, 34),
(6, 35),
(6, 36),
(7, 37),
(7, 38),
(7, 39),
(7, 40),
(7, 41),
(7, 42),
(8, 43),
(8, 44),
(8, 45),
(8, 46),
(8, 47),
(8, 48),
(9, 49),
(9, 50),
(9, 51),
(9, 52),
(9, 53),
(9, 54),
(10, 55),
(10, 56),
(10, 57),
(10, 58),
(10, 59),
(10, 60),
(12, 16),
(12, 19),
(12, 61),
(12, 62),
(12, 63),
(12, 64),
(13, 63),
(13, 65),
(13, 66),
(13, 67),
(13, 68),
(13, 69),
(14, 30),
(14, 70),
(14, 71),
(14, 72),
(14, 73),
(14, 74);

-- --------------------------------------------------------

--
-- Table structure for table `series`
--

CREATE TABLE `series` (
  `ID` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  `details` longtext NOT NULL,
  `date` date NOT NULL,
  `country` varchar(30) NOT NULL,
  `type` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `series_cast`
--

CREATE TABLE `series_cast` (
  `series_id` int(11) NOT NULL,
  `cast_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `server`
--

CREATE TABLE `server` (
  `ID` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `statues` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 stream, 2 download',
  `quality` varchar(70) NOT NULL,
  `movie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `server`
--

INSERT INTO `server` (`ID`, `link`, `statues`, `quality`, `movie_id`) VALUES
(1, 'https://verystream.com/e/5nx1gaR7NXL/', 1, 'HDTC', 1),
(2, 'https://vidstream.top/f/8gBFegNqDW/?vclid=dd4cda0b6e91ce1881169c4ce317a5df21cc95e5e2f2574a8f5fd84bhWWWOZjVWOWmWOiwEHRbieZjrBdWOmOWOdZgWOWmWOkXiiOWzILkeWOmOWOnBitOWmWOmCevWEeEzmiihOkHyQOwOwbOWN', 2, 'HD 720', 1),
(3, 'https://verystream.com/e/Sp9kHh66LV9/', 1, 'HD-Rip', 2),
(4, 'https://vidstream.top/f/6zKOsTTbc9/?vclid=565ec7270235e94565c276eef84322121c8c9029a87ce51aa55660f6FUUUcdPnUcUFUchEZIqXhrdPwszUcFcUclshVcUFUcFgrKUZrZSFhhmcDIeycEcEXcFcUczdoUcUFUcDjhhcUSLxDrUcUf', 2, 'HD 720', 2),
(5, 'https://verystream.com/e/TjoTQ38zWHk/%28arabtigers.com%29.spid720p.HDTC.mkv', 1, 'HD-CAM', 3),
(6, 'https://vidstream.top/f/BuYVGhQkvo/?vclid=b5578e18aa93adb7e551bd481ee29de47579b93d668782b5ea323dceHyyybXmOUbyuybuiznySzSZuOOgbwREvbWbWQbubybMAKybyuybOWSRCQOzMAYmNybubybNMhybyuybwdOObyZfDwzybyt', 2, 'HD 720', 3),
(7, 'https://openload.co/embed/5LXQXKFByLU/', 1, 'HDTC', 4),
(8, 'https://vidstream.top/f/mCZGZLqOS3/?vclid=660443043d8a463f2b27b1f40d3c305a73d9cea1a293823091ed2282nAAAUcSPaUAlAUlwzhARzRHlPPxUgLpVUNUNBUlUAUMbOAUAlAUgtPPUAHDsgzAUlUAUbFQAUAlAUPNRLrBPzbFESMAUAd', 2, 'Full HD 1080', 4),
(9, 'https://verystream.com/e/ULEF4LZ4NXZ/', 1, 'BlueRay', 5),
(10, 'https://verystream.com/stream/ULEF4LZ4NXZ/%28arabtigers.com%29.Captain_Marvel.mp4', 2, 'Full HD 1080', 5),
(11, 'https://s2.govid.me/to3qqrgzijvsy46b3wrgx6x5cvj6e5k5ain62yfhdnhmnmc3auc7ks3po5mq/v.mp4', 1, 'HDTV', 6),
(12, 'https://vidstream.top/f/UaFpk79eaD/?vclid=fc37f37fb222227e8c117903c11aac002f6bf4840bd633018ec638abDbbbBTPdbBbIbBAAAbrovprovRYpBvWYBIBbBlpoOBbIbBIgysbvyveIooaBuWQtBFBFYBIBbBPGxbBbIbBoFvWRYomPmotvdbBbw', 2, 'Full HD 1080', 6),
(13, 'https://gounlimited.to/embed-9foedxfu2xc7.html', 1, 'HD-CAM', 7),
(14, 'https://verystream.com/stream/L7DP21sw8Kk/%28arabtigers.com%29.The.Lion.King.2019.720p.HDCAM.mp4', 2, '-', 7),
(15, 'https://verystream.com/e/AjgVE5EUMWy/', 1, 'HD-CAM', 8),
(16, 'https://verystream.com/stream/AjgVE5EUMWy/%28arabtigers.com%29.Dark_Phoenix.mp4', 2, 'Full HD 1080', 8),
(17, 'https://verystream.com/e/fMT5aLy7Amz/', 1, 'HD-Rip', 9),
(18, 'https://verystream.com/stream/fMT5aLy7Amz/%28arabtigers.com%29.Men_in_Black_International_2019_720p_NEW_V2_HC_HDTC.mp4', 2, 'Full HD 1080', 9),
(19, 'https://openload.co/embed/dkwi43x1QFo/', 1, 'HDTC', 10),
(20, 'https://openload.co/f/dkwi43x1QFo/', 2, 'HD 720', 10),
(21, 'https://vidstream.top/f/B62ci5uGwJ/?vclid=817426b9dbdf9e5892c3e7bc5e135630cc25369e4839eef3d0338985BeeezaDpezeSezitUyLTigagiNUEezSzezsaEezeSezBBBeOkiizeMjPVfezSzezwAiFzeSezSdfreUfUMSiiGzVyWNztztTzem', 2, 'SD 360', 10),
(22, 'https://vidstream.top/f/xsoFvYMWrl/?vclid=7a83b373033150fbd1736c5544712ddce0aaa1ed1233a2a82d06cf30zlllsxWdlslElsmmmlRPMMslnfpaqlsEslsWQUlslElsMOcSbzMkWkMKcdlsEslsCGMDslElsEZqulcqcnEMMTsaSrKsOsOzslh', 2, 'LOW 240', 10),
(23, 'https://vidstream.top/f/gE8nN11Cm2/?vclid=454ae999929cfd13274667178e0a1a4529a1ccd3d5df4b75cfdcd0afhWWWOZjVWOWmWOiwEHRbieZjrBdWOmOWOdZgWOWmWOPPPWrXiiOWzILkeWOmOWOnBitOWmWOmCevWEeEzmiihOkHyQOwOwbOWN', 2, 'HD 720', 9),
(24, 'https://vidstream.top/f/7U2UlWHOqM/?vclid=ef21c76f705a6988362a269676a7d38421db7c9a09ead0ac2fa00e52pGGGSsEhfSGFGSFrzHGRzRtFhhnSaLMkSISIpSFSGSNjbGSGFGShIRLephzNjQExGSFSGSxNUGSGFGSiiiGQWhhSGtZoazGSGl', 2, 'SD 480', 9),
(25, 'https://vidstream.top/f/qlhmlbc1dp/?vclid=2f25ce084a0f44cc2e906f1d3c40ee365d331bd45ba87b2efafe4541IUUUcItMHcUVUcVvOsUSOSqVMMYcLzWkcncnDcVcUclNQUcUVUcMnSzZDMOlNmtKUcVcUcKliUcUVUcdddUmFMMcUqyrLOUcUR', 2, 'SD 360', 9),
(26, 'https://vidstream.top/f/r27uSQFrZq/?vclid=d72b1f9f1c13b87387d7d5578a173175f72e08abe91de5c83c2de4dcrfffiYVPaifMfiMBpRfqpqUMPPciQlLhiFiFGiMifingmfifMfirrrfWzPPifUtbQpfiMifigODfifMfiPFqlsGPpgOWVnfifK', 2, 'LOW 240', 9),
(27, 'https://vidstream.top/f/TA3RHqOyv8/?vclid=5d4fa4d2fa0a1841b5e28ae2479b15212e31c09b00d6bf0292a6c3cdECCCgyXBCgCSCgMUKZFnMDyXPedCgSgCgieMkgCSCgShDcCKDKYSMMIgHZOEgUgUngSgCgdyrCgCSCgVVVCPuMMgCYqGHDCgCs', 2, 'HD 720', 4),
(28, 'https://vidstream.top/f/zl0ZEkhGKV/?vclid=0f3b7a811125c31e0ca771943c31a136ab7de354a8c1dbeccedf2224dWWWtRvrCtWqWtqNTGWoTohqrrUtPsLntgtgmtqtWtEpVWtWqWtrgosYmrTEpdvcWtqtWtcEbWtWqWtZZZWdwrrtWhufPTWtWy', 2, 'SD 480', 4),
(29, 'https://vidstream.top/f/YSYq5rTxAP/?vclid=3ba986aaf4e764c06c231b7e10c7e039cd0afff3ae8a94523e61948fAgggAtNzgAgDgAkkkgRjvvAgqQhLWgADAgAmBvfAgDgADiWOgXWXqDvvFALUcbAHAHlADAgANsSgAgDgAvHXUZlvWNsRBtgAgM', 2, 'SD 360', 4),
(30, 'https://vidstream.top/f/rJUJEfGhXB/?vclid=04b333c46d01130afb80765f743ac38512eb08bf5cebb9beddcd5928iyyyedjRreyoyeoLPEylPlOoRRSeTqwpevevFeoeyeafNyeyoyeRvlqMFRPafQjUyeoeyeUauyeyoyeVVVyQiRReyOYhTPyeyX', 2, 'LOW 240', 4),
(31, 'https://vidstream.top/f/EwSgU5GAhn/?vclid=a7c9ee7db143fe26351036fc1f24e0ab2725db50c119f06b8471f03aKRRRzqsMTzRVRzVwCnRECEFVMMkzYcyWzPzPrzVzRzUlmRzRVRzaaaRQbMMzRFehYCRzVzRzlxBRzRVRzMPEcjrMQxaRzRi', 2, 'SD 480', 8),
(32, 'https://vidstream.top/f/42p0cEQILT/?vclid=fecdc099970a3e8e71f9e5a04b3e268653ffec322f31e4c2c786a417jyyyLNdpuLycyLcXxiyUxUGcppELweDvLOLOYLcLyLkMryLycyLjjjyQhppLyGTAwxyLcLyLMVnyLycyLpOUeBYpQVjyLyl', 2, 'SD 360', 8),
(33, 'https://vidstream.top/f/WJey5LGQme/?vclid=cb2df54f160669f11682cd10a93bd29be974eb2ca0778b045583d051TIIIcqwTIcIpIcDDDIVxEEcIyfAdRIcpcIcHKEFcIpIcpaRnIWRWypEEGcdCNocscsMcpcIcwkmIcIpIcEsWCBMEVkDIcIl', 2, 'LOW 240', 8),
(34, 'https://vidstream.top/f/ZyVo6e0FII/?vclid=644a4cab7bb7755ced6d70a8ecb36bfdd68cedc040880b2cb45f86e3WRRRMvKoRMRyRMnnnRANEEMRSGjZVRMyMRMYlEqMRyRMyuVURrVrSyEEmMZIxwMgMgpMyMRMKsiRMRyRMEgrIBpEVKsAlvRMRX', 2, 'HD 720', 7),
(35, 'https://vidstream.top/f/yx2qFASNYz/?vclid=42b80f573acf2e87447b1410444b05d9c25e2515b8a82862e753cb82ECCCgdyrCgCSCgVVVCPuMMgCYqGHDCgSgCgyXBCgCSCgMUKZFnMDyXPedCgSgCgieMkgCSCgShDcCKDKYSMMIgHZOEgUgUngCs', 2, 'SD 360', 7),
(36, 'https://vidstream.top/f/rtTjaknMhK/?vclid=2f5832034bce4a063b5f6610fa16aa7930fe7fb7ff16109de2001656ECCCgdyrCgCSCgVVVCPuMMgCYqGHDCgSgCgieMkgCSCgShDcCKDKYSMMIgHZOEgUgUngSgCgyXBCgCSCgMUKZFnMDyXPedCgCs', 2, 'LOW 240', 7),
(37, 'https://vidstream.top/f/VGYAk0uV8I/?vclid=a515fc367f3e17234a911007ece15583ea3b7494ed5e493e70fad39bnAAAUcSPaUAlAUlwzhARzRHlPPxUgLpVUNUNBUlUAUMbOAUAlAUvvvAEtPPUAHDsgzAUlUAUbFQAUAlAUPNRLrBPzbFESMAUAd', 2, 'HD 720', 5),
(38, 'https://vidstream.top/f/vOPaGdEP1s/?vclid=9c09b6c6d67c7d74433d7d4c2524cc0b0d0523a0fe5a90ad45aa794eBeeezwAiFzeSezSdfreUfUMSiiGzVyWNztztTzSzezaDpezeSezitUyLTifaDOAsezSzezsaEezeSezBBBeOkiizeMjPVfezem', 2, 'SD 480', 5),
(39, 'https://vidstream.top/f/7ZSMm3yy6z/?vclid=39719c593eec3b542528d6216891b638d53ed8d6150ce21fe1aeca9cpGGGSNjbGSGFGShIRLephzNjQExGSFSGSsEhfSGFGSFrzHGRzRtFhhnSaLMkSISIpSFSGSxNUGSGFGSiiiGQWhhSGtZoazGSGl', 2, 'SD 360', 5),
(40, 'https://vidstream.top/f/bPNpsIGayR/?vclid=d7cd720b8cf30ff95a45c9372e6ea1c2e06bf009b4a9ebedf997fecbHyyybMAKybyuybOWSRCQOzMAYmNybubybXmOUbyuybuiznySzSZuOOgbwREvbWbWQbubybNMhybyuybrrryYdOObyZfDwzybyt', 2, 'LOW 240', 5),
(41, 'https://vidstream.top/f/hJelNoR4sg/?vclid=d76981fa07357c729bbfac05ff9b3826c589095ee915a45149d744e5MvvvVOeBwVvWvVWdCUvkCkSWBBbVYynuVXVXrVWVvVsoZvVvWvVRRRvfaBBVvSgPYCvVWVvVoxQvVvWvVBXkylrBCoxfesvVvc', 2, 'SD 480', 3),
(42, 'https://vidstream.top/f/70AdALbj7k/?vclid=fd7e3bb63f851a70c43584c80298e2b352db39250a97c4129631c9cfQzzzVGegzVzXzVRbQBkIRYGeHfLzVXVzVcfRUVzXzVXoYNzQYQEXRRlVpBmMVbVbIVXVzVLGFzVzXzVxxxzHPRRVzEvupYzVzs', 2, 'SD 360', 3),
(43, 'https://vidstream.top/f/wwAQDRuli3/?vclid=8175d05d028f6aecf4ba8a749aef34ba01872f806f4e4dc7a06d63d5vNNNZfvzNZNpNZulPkBDuYfvqhRNZpZNZChuTZNpNZpsYINPYPrpuuSZHkUwZlZlDZpZNZRfGNZNpNZXXXNqouuZNryjHYNZNF', 2, 'LOW 240', 3),
(44, 'https://vidstream.top/f/t3dmU5xZjy/?vclid=1f4c183fe05ded9b02e44e8991a46a59f90b5efd17781906c204c4b6alllIwCilIlylIAVYRtGAPwCqezlIyIlIzwElIlylIdddlqvAAIlkNmgPlIyIlITeAMIlylIyHPolYPYkyAAnIgRUOIVIVGIlb', 2, 'SD 480', 2),
(45, 'https://vidstream.top/f/4axYqpDMn9/?vclid=810c9b063dca65548124c7cb5838488b129aead3d09b10e482267cadhWWWOdZgWOWmWOPPPWrXiiOWzILkeWOmOWOnBitOWmWOmCevWEeEzmiihOkHyQOwOwbOmOWOZjVWOWmWOiwEHRbieZjrBdWOWN', 2, 'SD 360', 2),
(46, 'https://vidstream.top/f/jD0xItWDlZ/?vclid=a5fdfad7d97840dd70f4ba337d4aba0e1d7ffc0c67d60d806a70f76eSVVVXPQcVXViVXStGoaeSfPQBTrVXiXVXWTSCXViVXiMfmVGfGRiSSFXpoUbXtXteXiXVXrPYVXViVXsssVBNSSXVRzOpfVXVL', 2, 'LOW 240', 2),
(47, 'https://vidstream.top/f/EJLVYpyIvU/?vclid=9a34b6699d39ef7a799ff15fb7386bf19858c2ffdc8e9aa2d74db3ffLoooVxuEoVoHoViiiodTppVofACecoVHVoVuItoVoHoVpWMnFrpcuIdGxoVHVoVLGpbVoHoVHRcvoMcMfHppmVenqOVWVWrVog', 2, 'SD 480', 1),
(48, 'https://vidstream.top/f/FcCsRT7JjI/?vclid=45947380edc3ed3b2f74a3c86c29483a12d4e574354775d604916b3frfffingmfifMfirrrfWzPPifUtbQpfiMifigODfifMfiPFqlsGPpgOWVnfiMifiYVPaifMfiMBpRfqpqUMPPciQlLhiFiFGifK', 2, 'SD 360', 1),
(49, 'https://vidstream.top/f/MGP7UTIKJs/?vclid=8a7b30f43883430e2abdb27057a50ab5be7ea62fa61d4706836d7f71CNNNaDgfNaNhNaZZZNsqUUaNxzGjVNahaNagSvNaNhNaUCLoBrUVgSseDNahaNaTeUkaNhNahdVyNLVLxhUUQajoFPaCaCraNX', 2, 'LOW 240', 1),
(53, 'https://cassabanana.fruithosted.net/dl/n/-TrAKD9HGPnaps8t/fcqltmsftbfslatt/68Ycq7qnahfSECQGpYFZT6U_KgSGK6r1uJbGPckDX9OsX54y55VWH-9Mk2TFRGAS2OrW95HFWdmG90fnqJzv4iQjQ0koJjG5K9-VmZPn_4k8dWxyZuv64wUWxepyM17O9ZZfuEA_n-aIUtyZiVhi-_ic1705as5HABvtor2WOwiz6odzY-wh', 1, 'BlueRay', 12),
(54, 'https://vidstream.top/f/dJHrqPjnZl/?vclid=82c2fb0c9337def8a52d4b46bf6314b0b97e28499f2f8f42594899a1gaaaQIDTmQapaQpolCaBlBGpTTnQUPkMQbQbvQpQaQfigaQapaQWWWaYTBDYTBwvDQBPvQaH', 2, 'Full HD 1080', 12),
(55, 'https://hqq.tv/player/embed_player.php?vid=czFXQXhKZEx1bktXWGpMRy96dXFWUT09&autoplay=no', 1, 'BlueRay', 13),
(56, 'https://vidstream.top/f/7g8c47Sx1U/?vclid=01235189a8c8fc3c9b2c12f693fdeffc2f0c90c4d3f201fac0bc12bfyrrrimVFdirsrisWRwryRyEsFFZiokTNiAiAKisiriUqYrirsriuuuraHFFirEeLoRrisiriqCGrirsritOvFULbFIAKirD', 2, 'Full HD 1080', 13),
(57, 'https://vidstream.top/f/wnO7Ubhxx5/?vclid=1c1a9628a46e995c9aeec176c95b291b76e4bd3ff7df47cb3c00c4c5NaaapBxMapaqapsssahQmmpalinKzapqpapxgIapaqapLASmBnNmdVupqpapjwmPpaqapqTzcaDzDlqmmopKvkHpVpVupaU', 2, 'HD 720', 13),
(58, 'https://vidstream.top/f/xnsbXGimAT/?vclid=4194051f1b661276367dc40a2269e61ff58a3e7a70e7bd8b4da58d79OsssxFVTsxstsxPcieAYyeaEgxtxsxBmeHxstsxtwRGsURUXteeMxDlvZxExEgxtxsxAFhsxstsxzzzsnkeexsXpYDRsxsC', 2, 'SD 480', 13),
(59, 'https://vidstream.top/f/J6TWn0irb3/?vclid=513f7c158f4d8498c2a1f5b0eb62aa995da6ec93a783f77f4eda1a64rfffingmfifMfirrrfWzPPifUtbQpfiMifigODfifMfiTNSPnbHPjFGiMifiYVPaifMfiMBpRfqpqUMPPciQlLhiFiFGifK', 2, 'SD 360', 13),
(60, 'https://vidstream.top/f/Ydh5SAFkB2/?vclid=094596dec06a5ae6bc2b570573cdd0186e90bced895b218ad1b8dbcbIUUUcKliUcUVUcdddUmFMMcUqyrLOUcVcUcItMHcUVUcVvOsUSOSqVMMYcLzWkcncnDcVcUclNQUcUVUcAPaMKroMBnDcUR', 2, 'LOW 240', 13),
(61, 'https://vidstream.top/f/rjm7LYwfTW/?vclid=a8fe1aa6dcf7867b83abae96f8f9cbde47a6cf1a9dc6da215fbba4efdWWWtcEbWtWqWtZZZWdwrrtWhufPTWtqtWtRvrCtWqWtqNTGWoTohqrrUtPsLntgtgmtqtWtEpVWtWqWtkXKrcfSrIgtWtWy', 2, 'HD 720', 12),
(62, 'https://vidstream.top/f/nvUx8Smm2g/?vclid=fdcb708bb0b6a9b8e05b9dd5be1f277e04734df83024b1354d15d9b1PEEEjtxcujEvEjvNYTEIYIrvccGjwnMkjmjmejvjEjpKPEjEvEjsFVcDCRcqmjEjvjEjDplEjEvEjHHHEhAccjErUCwYEjEb', 2, 'SD 480', 12),
(63, 'https://vidstream.top/f/C8zRRkQlrU/?vclid=a4269cca9404809113719658d95363617cdd1b8bbf45f81d4339da0dvNNNZRfGNZNpNZXXXNqouuZNryjHYNZpZNZChuTZNpNZpsYINPYPrpuuSZHkUwZlZlDZpZNZfvzNZNpNZQmxuRjEudlZNZNF', 2, 'SD 360', 12),
(64, 'https://s43.vidbom.com/6jmnuuj6raazsalriwhab4pxaogxa47vkhljysaync5jl6ioe56gjnzobvtq/v.mp4', 1, 'BlueRay', 14),
(65, 'https://vidstream.top/f/YaGBLUEwhQ/?vclid=59be89b1ebae0ee2bca60004a6c14a832a7560b868ce69a196fb2f08ooooxvPWoxoBoxkicymqayKgBoxBxoxmvCoxoBoxIIIoLhyyxobwqXroxBxoxpVyexoBoxBfrMoZrZbByyuxXRYUxgxgzxoF', 2, 'Full HD 1080', 14);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `country` varchar(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `statues` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `username`, `password`, `email`, `country`, `image`, `statues`) VALUES
(2, 'Mohamed Ahmed', '6c20fd1538bc2b091ab019f7e74a17e420fc3d13', 'weloahmed53@yahoo.com', 'Egypt', '170957.jpg', 1),
(4, 'Welo', '6c20fd1538bc2b091ab019f7e74a17e420fc3d13', 'welomazika@yahoo.com', 'Egypt', '', 1),
(6, 'Mondo', '6c20fd1538bc2b091ab019f7e74a17e420fc3d13', 'mondoelsendbad4@gmail.com', 'Egypt', '', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cast`
--
ALTER TABLE `cast`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `series_id` (`series_id`),
  ADD KEY `link_id` (`link_id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`),
  ADD KEY `user_id_3` (`user_id`);

--
-- Indexes for table `movies_cast`
--
ALTER TABLE `movies_cast`
  ADD KEY `movie_id` (`movie_id`,`cast_id`),
  ADD KEY `movie_cast` (`cast_id`);

--
-- Indexes for table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `series_cast`
--
ALTER TABLE `series_cast`
  ADD KEY `series_id` (`series_id`,`cast_id`),
  ADD KEY `series_cast` (`cast_id`);

--
-- Indexes for table `server`
--
ALTER TABLE `server`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `link` (`link`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cast`
--
ALTER TABLE `cast`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `episodes`
--
ALTER TABLE `episodes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `series`
--
ALTER TABLE `series`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `server`
--
ALTER TABLE `server`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `episodes`
--
ALTER TABLE `episodes`
  ADD CONSTRAINT `series_link` FOREIGN KEY (`link_id`) REFERENCES `server` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movie_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `movies_cast`
--
ALTER TABLE `movies_cast`
  ADD CONSTRAINT `movie_cast` FOREIGN KEY (`cast_id`) REFERENCES `cast` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movie_id` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `series`
--
ALTER TABLE `series`
  ADD CONSTRAINT `series_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `series_cast`
--
ALTER TABLE `series_cast`
  ADD CONSTRAINT `series_cast` FOREIGN KEY (`cast_id`) REFERENCES `cast` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `series_id` FOREIGN KEY (`series_id`) REFERENCES `series` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `server`
--
ALTER TABLE `server`
  ADD CONSTRAINT `movie_link` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
