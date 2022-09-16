<?php $this->layout('_theme') ?>

<?php

$status = 1;

//conexao da base de dados//
require 'src/db/config.php';
session_start();

$allNews = $pdo->prepare("SELECT * FROM news ");
$allNews->execute();

// Publicidades
$publiciteis_1_3 = $pdo->prepare("SELECT * FROM publicity ORDER BY id DESC limit 0, 3 ");
$publiciteis_1_3->execute();
$publiciteis_3_6 = $pdo->prepare("SELECT * FROM publicity ORDER BY id DESC limit 3, 3 ");
$publiciteis_3_6->execute();

// Escolhas dos editores
$choose_editors = $pdo->prepare("SELECT * FROM news where choose_editors_news='sim' ORDER BY id DESC limit 0, 4 ");
$choose_editors->execute();

// Noticias em destaque
$emphasis_news1 = $pdo->prepare("SELECT * FROM news where emphasis_news='sim' ORDER BY id DESC limit 0, 1 ");
$emphasis_news1->execute();
$emphasis_newsList = $pdo->prepare("SELECT * FROM news where emphasis_news='sim' ORDER BY id DESC limit 1, 2 ");
$emphasis_newsList->execute();

// Ultimas Noticias
$lastNews = $pdo->prepare("SELECT * FROM news ORDER BY id DESC limit 0, 4 ");
$lastNews->execute();

// Mais noticias sessão 1
$moreNews1 = $pdo->prepare("SELECT * FROM news ORDER BY id DESC limit 6, 1 ");
$moreNews1->execute();
$moreNewsList1 = $pdo->prepare("SELECT * FROM news ORDER BY id DESC limit 7, 4 ");
$moreNewsList1->execute();

// Mais noticias sessão 2
$moreNews2 = $pdo->prepare("SELECT * FROM news ORDER BY id DESC limit 10, 1 ");
$moreNews2->execute();
$moreNewsList2 = $pdo->prepare("SELECT * FROM news ORDER BY id DESC limit 11, 4 ");
$moreNewsList2->execute();

// Noticias Relevantes
$relevant_news = $pdo->prepare("SELECT * FROM news where relevant_news='sim' ORDER BY id DESC limit 0, 4 ");
$relevant_news->execute();

// Mais noticias sessão 1
$rightNews1 = $pdo->prepare("SELECT * FROM news WHERE category_id = '4' ORDER BY id DESC limit 0, 1 ");
$rightNews1->execute();
$rightNewsList1 = $pdo->prepare("SELECT * FROM news ORDER BY RAND() DESC limit 1, 4 ");
$rightNewsList1->execute();

// Mais noticias sessão 2
$rightNewsList2 = $pdo->prepare("SELECT * FROM news WHERE category_id = '3' ORDER BY id DESC limit 0, 3 ");
$rightNewsList2->execute();

// Mais noticias sessão 3
$rightNews3 = $pdo->prepare("SELECT * FROM news WHERE category_id = '6' ORDER BY id DESC limit 0, 1 ");
$rightNews3->execute();
$rightNewsList3 = $pdo->prepare("SELECT * FROM news WHERE category_id = '6' ORDER BY id DESC limit 1, 4 ");
$rightNewsList3->execute();


// Video
$videoInit = $pdo->prepare("SELECT * FROM videos_news ORDER BY id DESC limit 0, 1 ");
$videoInit->execute();
$video_list = $pdo->prepare("SELECT * FROM videos_news ORDER BY id DESC ");
$video_list->execute();

$bau = $pdo->prepare("SELECT * FROM news ORDER BY id DESC limit 17, 4 ");
$bau->execute();

$publiciteis_7_10 = $pdo->prepare("SELECT * FROM publicity ORDER BY id DESC limit 6, 3 ");
$publiciteis_7_10->execute();

?>


<style>
/* SPINNER */
.homeContainer {
  width: 100%;
  display: flex;
  flex-direction: column;
  gap: 2.6rem;
}

/* SPINNER */
.homeContainer .swiper {
  /* margin-top: 10rem; */
  width: 100vw;
  height: calc(100vh - 20rem);
}

.homeContainer .swiper .slide .imgBackground {
  width: 100%;
  min-height: 100vh;
  position: absolute;
  background-size: cover;
  background-position: center;

  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

.homeContainer .swiper .slide {
  height: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

.homeContainer .swiper .slide .slideInfo {
  max-width: 100%;
  margin-left: 2rem;
  display: flex;
  gap: 1.4rem;
  flex-direction: column;
}

.homeContainer .swiper .slide .slideInfo h1 {
  color: #ffffff;
  font-weight: 800;
  font-size: 4rem;
  font-family: 'Public Sans', sans-serif;
}

.homeContainer .swiper .slide .slideInfo p {
  color: #ffffff;
  font-size: 1.4rem;
  max-width: 60%;
}

.homeContainer .swiper .slide .slideInfo button {
  max-width: 14rem;
  height: 3rem;
  font-size: 1.1rem;
  color: #fcfcfc;
  font-weight: 700;
  background-color: var(--main-color);

  cursor: pointer;
}

.homeContainer .swiper .slide .slideInfo button a {
  color: #fff;
}

.container {
  display: flex;
  width: 100%;
  margin: 0 2rem;

  max-width: 1400px;
  flex-direction: column;
}

.titleSectionContainer {
  width: 100%;
  border-bottom: 0.1rem solid #c6c6c6;
}

.titleSectionContainer h1 {
  margin: 1rem 0px;
  font-size: 1.1rem;
  text-transform: uppercase;
  color: #111111;
  font-weight: 800;
  font-family: 'Merriweather', serif;
}

.titleSectionContainer h1 span {
  color: var(--main-color);
}

/* CHOOSES */
.choosesEditors {
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}

.choosesEditors h1 {
  margin: 1rem 0px;
  font-size: 1.1rem;
  text-transform: uppercase;
  color: #111111;
  font-weight: 800;
  font-family: 'Merriweather', serif;
  transition: 0.6s ease;
}

.choosesEditors h1 span {
  color: blue;
}

.choosesEditors .choosesContainer {
  display: flex;
  flex-direction: row;
  gap: 1.5rem;
  flex-wrap: wrap;
}

.choosesEditors .choosesContainer .choose {
  flex: 1;
  width: 100%;
  min-width: 330px;
  max-width: 330px;
}

.choosesEditors .choosesContainer .choose .containerImage {
  width: 100%;
  height: 10rem;
  position: relative;
  overflow: hidden;
}

.choosesEditors .choosesContainer .choose .containerImage img {
  position: absolute;
  width: 100%;
  height: 100%;
  overflow: hidden;
  object-fit: cover;

  transition: 1s ease;
}

.choosesEditors .choosesContainer a:hover .choose .containerImage img {
  -webkit-transform: scale(1.2);
  transform: scale(1.2);
}

.choosesEditors .choosesContainer .choose .textContainer {}

.choosesEditors .choosesContainer .choose {
  color: #111;
  line-height: 130%;
  /* text-align: justify; */
  margin: 1rem 0px;

  overflow: hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-line-clamp: 3;
  /* number of lines to show */
  line-clamp: 3;
  -webkit-box-orient: vertical;
}

.choosesEditors .choosesContainer .choose .textContainer p {
  margin-top: 0.8rem;
  transition: 0.4s ease;
}

.choosesEditors .choosesContainer .choose .textContainer p:hover {
  color: var(--main-color);
}

.choosesEditors .choosesContainer .choose .textContainer span {
  font-size: 0.8rem;
  color: #111;
  font-weight: 600;
  margin: 0.4rem 0px;

  overflow: hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  /* number of lines to show */
  line-clamp: 2;
  -webkit-box-orient: vertical;
}

/* PUBLICITY */
.publicity {
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}

.publicity .containerImage {
  width: 100%;
  height: 18rem;
  position: relative;
  overflow: hidden;
}

.publicity .containerImage img {
  position: absolute;
  width: 100%;
  height: 100%;
  overflow: hidden;
  object-fit: cover;

  transition: 1s ease;
}

.publicity .containerImage a:hover img {
  -webkit-transform: scale(1.2);
  transform: scale(1.2);
}

/* LAST NOTICES */
.lastNotices {
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}

.lastNotices .lastNoticesAllContainer {
  display: flex;
  flex-direction: row;
  gap: 2.4rem;
}

/* LAST NOTICES */
.lastNotices .lastNoticesAllContainer .lastNoticesContainer {
  flex: 2;
}

.lastNotices .lastNoticesAllContainer .lastNoticesContainer .notice {
  width: 100%;
  min-height: 14rem;
  margin-top: 1rem;
  padding: 1.4rem 0;

  display: flex;
  gap: 1rem;

  border-bottom: 0.1rem solid #c6c6c6;
}

.lastNotices .lastNoticesAllContainer .lastNoticesContainer .notice .imageContainer {
  position: relative;
  width: 100%;
  max-width: 16rem;
  min-width: 12rem;
  max-height: 18rem;
  overflow: hidden;
}

.lastNotices .lastNoticesAllContainer .lastNoticesContainer .notice .imageContainer img {
  position: absolute;
  width: 100%;
  height: 100%;
  overflow: hidden;
  object-fit: cover;

  transition: 1s ease;
}

.lastNotices .lastNoticesAllContainer .lastNoticesContainer a:hover .notice .imageContainer img {
  -webkit-transform: scale(1.2);
  transform: scale(1.2);
}

.lastNotices .lastNoticesAllContainer .lastNoticesContainer .notice .noticeContent {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.lastNotices .lastNoticesAllContainer .lastNoticesContainer .notice .noticeContent h1 {
  font-size: 1.2rem;
  color: #000000;
  font-weight: 800;
  text-transform: uppercase;

  overflow: hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  /* number of lines to show */
  line-clamp: 2;
  -webkit-box-orient: vertical;
  transition: 0.4s ease;
}

.lastNotices .lastNoticesAllContainer .lastNoticesContainer a:hover .notice .noticeContent h1 {
  color: var(--main-color);
}

.lastNotices .lastNoticesAllContainer .lastNoticesContainer .notice .noticeContent p {
  font-size: 0.98rem;
  color: #535353;

  overflow: hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-line-clamp: 4;
  /* number of lines to show */
  line-clamp: 4;
  -webkit-box-orient: vertical;
}

.lastNotices .lastNoticesAllContainer .lastNoticesContainer .notice .noticeContent .noticeInfo {
  display: flex;
  flex-direction: row;
  gap: 1rem;
}

.lastNotices .lastNoticesAllContainer .lastNoticesContainer .notice .noticeContent .noticeInfo p {
  font-size: 0.9rem;
  color: #535353;

  overflow: hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-line-clamp: 4;
  /* number of lines to show */
  line-clamp: 4;
  -webkit-box-orient: vertical;
}

/* OTHER NOTICES */
.lastNotices .lastNoticesAllContainer .otherNotices {
  flex: 1;
  min-width: 20rem;
}

.lastNotices .lastNoticesAllContainer .otherNotices .categoryTItleSectionContainer {
  background-color: var(--main-color);
  padding: 0.5rem;
}

.lastNotices .lastNoticesAllContainer .otherNotices .categoryTItleSectionContainer h1 {
  font-size: 0.9rem;
  color: #ffffff;
  font-weight: 700;
  text-transform: uppercase;

  overflow: hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  /* number of lines to show */
  line-clamp: 2;
  -webkit-box-orient: vertical;
}

/* LAST NOTICE EMPHASIS */
.lastNotices .lastNoticesAllContainer .otherNotices .noticeInEmphasis {}

.lastNotices .lastNoticesAllContainer .otherNotices .noticeInEmphasis .notice {
  width: 100%;
  min-height: 14rem;
  margin-top: 1rem;
  padding: 1.4rem 0;

  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.lastNotices .lastNoticesAllContainer .otherNotices .noticeInEmphasis .notice .imageContainer {
  position: relative;
  width: 100%;
  height: 20rem;
  min-width: 12rem;
  max-height: 18rem;
  min-height: 12rem;
}

.lastNotices .lastNoticesAllContainer .otherNotices .noticeInEmphasis .notice .imageContainer img {
  position: absolute;
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.lastNotices .lastNoticesAllContainer .otherNotices .noticeInEmphasis .notice .noticeContent {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.lastNotices .lastNoticesAllContainer .otherNotices .noticeInEmphasis .notice .noticeContent h1 {
  font-size: 1.2rem;
  color: #000000;
  font-weight: 800;
  text-transform: uppercase;
}

.lastNotices .lastNoticesAllContainer .otherNotices .noticeInEmphasis .notice .noticeContent p {
  font-size: 0.98rem;
  color: #535353;
}

.lastNotices .lastNoticesAllContainer .otherNotices .noticeInEmphasis .notice .noticeContent .noticeInfo {
  display: flex;
  flex-direction: row;
  gap: 1rem;
}

.lastNotices .lastNoticesAllContainer .otherNotices .noticeInEmphasis .notice .noticeContent .noticeInfo p {
  font-size: 0.9rem;
  color: #535353;
}

/* RESUME */
.emphasesNotice .otherEmphases {
  display: flex;
  flex-direction: column;
  gap: 2rem;
  margin-bottom: 2rem;
}

.emphasesNotice .otherEmphases .notice {
  width: 100%;

  display: flex;
  flex-direction: row;
  gap: 1rem;
}

.lastNotices .lastNoticesAllContainer .otherNotices .noticeResume {
  width: 100%;

  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.lastNotices .lastNoticesAllContainer .otherNotices .noticeResume .notice {
  width: 100%;

  display: flex;
  flex-direction: row;
  gap: 1rem;
}

.lastNotices .lastNoticesAllContainer .otherNotices .noticeResume .notice .imageContainer {
  position: relative;
  width: 100%;
  height: 10rem;
  max-width: 7rem;
  max-height: 4.6rem;
}

.lastNotices .lastNoticesAllContainer .otherNotices .noticeResume .notice .imageContainer img {
  position: absolute;
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.lastNotices .lastNoticesAllContainer .otherNotices .noticeResume .notice .noticeContent {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.lastNotices .lastNoticesAllContainer .otherNotices .noticeResume .notice .noticeContent h1 {
  font-size: 0.9rem;
  color: #494949;
  font-weight: 700;
}

.lastNotices .lastNoticesAllContainer .otherNotices .noticeResume .notice .noticeContent .noticeInfo p {
  font-size: 0.9rem;
  color: #535353;
}

/* NOTICE EMPHASES */
.emphasesNotice {
  width: 100%;
  /* background-color: #111111; */
  padding: 3rem 0;

  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: center;
}

.emphasesNoticeAllContainer {
  width: 100%;
  margin-top: 1.6rem;

  display: flex;
  flex-direction: row;
  justify-content: center;
  gap: 2rem;
}

/* NOTICE EMPHASES left */
.emphasesNotice .emphases {
  position: relative;
  width: 100%;
  display: flex;
  overflow: hidden;
}

.emphasesNotice .emphases .imageContainer img {
  position: absolute;
  width: 100%;
  height: 100%;
  overflow: hidden;
  object-fit: cover;

  transition: 1s ease;
}

.emphasesNotice .emphases:hover .imageContainer img {
  -webkit-transform: scale(1.2);
  transform: scale(1.2);
}

.emphasesNotice .emphases .noticeContent {
  width: 100%;
  height: 100%;

  background: linear-gradient(#ffffff15, #111);

  display: flex;
  flex-direction: column;
  gap: 1rem;

  z-index: 2;
}

.emphasesNotice .emphases .noticeContent h1 {
  position: absolute;
  bottom: 3.4rem;
  left: 1rem;
  font-size: 1.8rem;
  color: #f3f3f3;
  font-weight: 700;
  transition: 0.4s ease;
  z-index: 2;
}

.emphasesNotice .emphases:hover .noticeContent h1 {
  color: var(--main-color);
}

.emphasesNotice .emphases .noticeContent .noticeInfo {
  position: absolute;
  bottom: 1rem;
  left: 1rem;

  display: flex;
  flex-direction: row;
  gap: 1rem;
}

.emphasesNotice .emphases .noticeContent .noticeInfo p {
  font-size: 0.9rem;
  color: #f3f3f3;
  z-index: 2;
}

/* NOTICE EMPHASES right */

.emphasesNotice .emphasesNoticeAllContainer .otherEmphases {
  display: flex;
  justify-content: space-around;
  flex-direction: column;
}

.emphasesNotice .emphasesNoticeAllContainer .otherEmphases a {
  width: 100%;
  max-width: 27rem;

  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.emphasesNotice .emphasesNoticeAllContainer .otherEmphases .notice {
  width: 100%;
  max-width: 27rem;

  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.emphasesNotice .emphasesNoticeAllContainer .otherEmphases .notice .imageContainer {
  position: relative;
  width: 100%;
  height: 20rem;
  max-height: 12.6rem;
  overflow: hidden;
}

.emphasesNotice .emphasesNoticeAllContainer .otherEmphases .notice .imageContainer img {
  position: absolute;
  width: 100%;
  height: 100%;
  overflow: hidden;
  object-fit: cover;

  transition: 1s ease;
}

.emphasesNotice .emphasesNoticeAllContainer .otherEmphases a:hover .notice .imageContainer img {
  -webkit-transform: scale(1.2);
  transform: scale(1.2);
}

.emphasesNotice .emphasesNoticeAllContainer .otherEmphases .notice .noticeContent {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.emphasesNotice .emphasesNoticeAllContainer .otherEmphases .notice .noticeContent h1 {
  font-size: 0.8rem;
  color: #111111;
  font-weight: 700;
  transition: 0.4s ease;
}

.emphasesNotice .emphasesNoticeAllContainer .otherEmphases a:hover .notice .noticeContent h1 {
  color: var(--main-color);
}

.emphasesNotice .emphasesNoticeAllContainer .otherEmphases .notice .noticeContent .noticeInfo {
  display: flex;
  flex-direction: row;
  gap: 1rem;
}

.emphasesNotice .emphasesNoticeAllContainer .otherEmphases .notice .noticeContent .noticeInfo p {
  font-size: 0.7rem;
  color: #111111;
}

/* more NOTICES */
.moreNotices {
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}

.moreNotices .moreNoticesAllContainer {
  display: flex;
  flex-direction: row;
  gap: 2.4rem;
}

/* more NOTICES */
.moreNotices .moreNoticesAllContainer .moreNoticesContainer {
  flex: 2;
}

.moreNotices .moreNoticesAllContainer .moreNoticesContainer .contentMoreNotice {
  display: flex;
  flex-direction: row;
  gap: 2rem;
  margin-top: 2rem;
}

.moreNotices .moreNoticesAllContainer .moreNoticesContainer .contentMoreNotice>a .notice {
  width: 100%;

  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.moreNotices .moreNoticesAllContainer .moreNoticesContainer .contentMoreNotice>a .notice .imageContainer {
  position: relative;
  width: 100%;
  height: 20rem;
  min-width: 14rem;
  max-height: 14rem;
}

.moreNotices .moreNoticesAllContainer .moreNoticesContainer .contentMoreNotice a>.notice .imageContainer img {
  position: absolute;
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.moreNotices .moreNoticesAllContainer .moreNoticesContainer .contentMoreNotice a>.notice .noticeContent {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.moreNotices .moreNoticesAllContainer .moreNoticesContainer .contentMoreNotice a>.notice .noticeContent h1 {
  font-size: 1.2rem;
  color: #000000;
  font-weight: 800;
  text-transform: uppercase;

  overflow: hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  /* number of lines to show */
  line-clamp: 2;
  -webkit-box-orient: vertical;
}

.moreNotices .moreNoticesAllContainer .moreNoticesContainer .contentMoreNotice a>.notice .noticeContent p {
  font-size: 0.98rem;
  color: #535353;

  overflow: hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-line-clamp: 3;
  /* number of lines to show */
  line-clamp: 3;
  -webkit-box-orient: vertical;
}

.moreNotices .moreNoticesAllContainer .moreNoticesContainer .contentMoreNotice a>.notice .noticeContent .noticeInfo {
  display: flex;
  flex-direction: row;
  gap: 1rem;
}

.moreNotices .moreNoticesAllContainer .moreNoticesContainer .contentMoreNotice a>.notice .noticeContent .noticeInfo p {
  font-size: 0.9rem;
  color: #535353;

  overflow: hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  /* number of lines to show */
  line-clamp: 2;
  -webkit-box-orient: vertical;
}

/* PUBLICITY */
.moreNotices .moreNoticesAllContainer .moreNoticesContainer .publicityLittle {
  width: 100%;
  margin-top: 3rem;
  display: flex;
  align-items: center;
  justify-content: center;
}

.moreNotices .moreNoticesAllContainer .moreNoticesContainer .publicityLittle .containerImage {
  width: 100%;
  height: 12rem;
  position: relative;
}

.moreNotices .moreNoticesAllContainer .moreNoticesContainer .publicityLittle .containerImage img {
  position: absolute;
  width: 100%;
  height: 100%;
  object-fit: cover;
}

/* RESUME */

.moreNotices .moreNoticesAllContainer .moreNoticesContainer .contentMoreNotice .noticeResume {
  flex: 1;

  width: 100%;

  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.moreNotices .moreNoticesAllContainer .moreNoticesContainer .contentMoreNotice .noticeResume .notice {
  width: 100%;
  padding-bottom: 1rem;
  border-bottom: 0.1rem solid #c6c6c6;

  display: flex;
  flex-direction: row;
  gap: 1rem;
}

.moreNotices .moreNoticesAllContainer .moreNoticesContainer .contentMoreNotice .noticeResume .notice .imageContainer {
  position: relative;
  width: 100%;
  height: 7em;
  min-width: 7rem;
  max-width: 7rem;
  max-height: 5rem;
}

.moreNotices .moreNoticesAllContainer .moreNoticesContainer .contentMoreNotice .noticeResume .notice .imageContainer img {
  position: absolute;
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.moreNotices .moreNoticesAllContainer .moreNoticesContainer .contentMoreNotice .noticeResume .notice .noticeContent {
  display: flex;
  flex-direction: column;
  gap: 0.5rem;
}

.moreNotices .moreNoticesAllContainer .moreNoticesContainer .contentMoreNotice .noticeResume .notice .noticeContent h1 {
  font-size: 0.9rem;
  color: #494949;
  font-weight: 700;
}

.moreNotices .moreNoticesAllContainer .moreNoticesContainer .contentMoreNotice .noticeResume .notice .noticeContent .noticeInfo p {
  font-size: 0.9rem;
  color: #535353;
}

/* OTHER NOTICES */
.moreNotices .moreNoticesAllContainer .otherNotices {
  flex: 1;
  min-width: 20rem;
}

.moreNotices .moreNoticesAllContainer .otherNotices .categoryTItleSectionContainer {
  background-color: var(--main-color);
  padding: 0.5rem;
}

.moreNotices .moreNoticesAllContainer .otherNotices .categoryTItleSectionContainer h1 {
  font-size: 0.9rem;
  color: #ffffff;
  font-weight: 700;
  text-transform: uppercase;
}

/* moreNotices EMPHASIS */
.moreNotices .moreNoticesAllContainer .otherNotices .noticeInEmphasis {}

.moreNotices .moreNoticesAllContainer .otherNotices .noticeInEmphasis .notice {
  width: 100%;
  min-height: 14rem;
  margin-top: 1rem;
  padding: 1.4rem 0;

  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.moreNotices .moreNoticesAllContainer .otherNotices .noticeInEmphasis .notice .imageContainer {
  position: relative;
  width: 100%;
  height: 15rem;
  min-width: 12rem;
  max-height: 18rem;
  min-height: 10rem;
}

.moreNotices .moreNoticesAllContainer .otherNotices .noticeInEmphasis .notice .imageContainer img {
  position: absolute;
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.moreNotices .moreNoticesAllContainer .otherNotices .noticeInEmphasis .notice .noticeContent {
  display: flex;
  flex-direction: row;
  align-items: center;
  gap: 1rem;
}

.moreNotices .moreNoticesAllContainer .otherNotices .noticeInEmphasis .notice .noticeContent a>strong {
  font-size: 2.6rem;
  color: #535353;
}

.moreNotices .moreNoticesAllContainer .otherNotices .noticeInEmphasis .notice .noticeContent .noticeContent_left {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.moreNotices .moreNoticesAllContainer .otherNotices .noticeInEmphasis .notice .noticeContent .noticeContent_left h1 {
  font-size: 1.2rem;
  color: #000000;
  font-weight: 800;
  text-transform: uppercase;
}

.moreNotices .moreNoticesAllContainer .otherNotices .noticeInEmphasis .notice .noticeContent .noticeContent_left p {
  font-size: 0.98rem;
  color: #535353;
}

.moreNotices .moreNoticesAllContainer .otherNotices .noticeInEmphasis .notice .noticeContent .noticeContent_left .noticeInfo {
  display: flex;
  flex-direction: row;
  gap: 1rem;
}

.moreNotices .moreNoticesAllContainer .otherNotices .noticeInEmphasis .notice .noticeContent .noticeContent_left .noticeInfo p {
  font-size: 0.9rem;
  color: #535353;
}

/* LAST NOTICES */
.noticesRelevant {
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}

.noticesRelevant .noticesRelevantAllContainer {
  display: flex;
  flex-direction: row;
  gap: 2.4rem;
}

/* RELEVANT NOTICES */
.noticesRelevant .noticesRelevantAllContainer .noticesRelevantContainer {
  flex: 2;
}

.noticesRelevant .noticesRelevantAllContainer .noticesRelevantContainer .allNotices {
  display: flex;

  flex-wrap: wrap;
  gap: 1rem;
}

.noticesRelevant .noticesRelevantAllContainer .noticesRelevantContainer .notice {
  width: 100%;
  max-width: 27.8rem;
  min-height: 14rem;
  margin-top: 1rem;
  padding: 1.4rem 0;

  display: flex;
  flex-direction: column;
  gap: 1rem;

  /* border-bottom: 0.1rem solid #c6c6c6; */
}

.noticesRelevant .noticesRelevantAllContainer .noticesRelevantContainer .notice .imageContainer {
  position: relative;
  width: 100%;
  height: 20rem;
  min-width: 12rem;
  max-height: 18rem;
}

.noticesRelevant .noticesRelevantAllContainer .noticesRelevantContainer .notice .imageContainer img {
  position: absolute;
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.noticesRelevant .noticesRelevantAllContainer .noticesRelevantContainer .notice .noticeContent {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.noticesRelevant .noticesRelevantAllContainer .noticesRelevantContainer .notice .noticeContent h1 {
  font-size: 1.2rem;
  color: #000000;
  font-weight: 800;
  text-transform: uppercase;

  overflow: hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  /* number of lines to show */
  line-clamp: 2;
  -webkit-box-orient: vertical;
}

.noticesRelevant .noticesRelevantAllContainer .noticesRelevantContainer .notice .noticeContent p {
  font-size: 0.98rem;
  color: #535353;

  overflow: hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-line-clamp: 4;
  /* number of lines to show */
  line-clamp: 4;
  -webkit-box-orient: vertical;
}

.noticesRelevant .noticesRelevantAllContainer .noticesRelevantContainer .notice .noticeContent .noticeInfo {
  display: flex;
  flex-direction: row;
  gap: 1rem;
}

.noticesRelevant .noticesRelevantAllContainer .noticesRelevantContainer .notice .noticeContent .noticeInfo p {
  font-size: 0.9rem;
  color: #535353;

  overflow: hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  /* number of lines to show */
  line-clamp: 2;
  -webkit-box-orient: vertical;
}

/* OTHER NOTICES */
.noticesRelevant .noticesRelevantAllContainer .otherNotices {
  flex: 1;
  min-width: 20rem;
}

.noticesRelevant .noticesRelevantAllContainer .otherNotices .categoryTItleSectionContainer {
  background-color: var(--main-color);
  padding: 0.5rem;
}

.noticesRelevant .noticesRelevantAllContainer .otherNotices .categoryTItleSectionContainer h1 {
  font-size: 0.9rem;
  color: #ffffff;
  font-weight: 700;
  text-transform: uppercase;
}

/* EMPHASIS */
.noticesRelevant .noticesRelevantAllContainer .otherNotices .noticeInEmphasis {}

.noticesRelevant .noticesRelevantAllContainer .otherNotices .noticeInEmphasis .notice {
  width: 100%;
  min-height: 14rem;
  margin-top: 1rem;
  padding: 1.4rem 0;

  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.noticesRelevant .noticesRelevantAllContainer .otherNotices .noticeInEmphasis .notice .imageContainer {
  position: relative;
  width: 100%;
  height: 20rem;
  min-width: 12rem;
  max-height: 18rem;
  min-height: 12rem;
}

.noticesRelevant .noticesRelevantAllContainer .otherNotices .noticeInEmphasis .notice .imageContainer img {
  position: absolute;
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.noticesRelevant .noticesRelevantAllContainer .otherNotices .noticeInEmphasis .notice .noticeContent {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.noticesRelevant .noticesRelevantAllContainer .otherNotices .noticeInEmphasis .notice .noticeContent h1 {
  font-size: 1.2rem;
  color: #000000;
  font-weight: 800;
  text-transform: uppercase;
}

.noticesRelevant .noticesRelevantAllContainer .otherNotices .noticeInEmphasis .notice .noticeContent p {
  font-size: 0.98rem;
  color: #535353;
}

.noticesRelevant .noticesRelevantAllContainer .otherNotices .noticeInEmphasis .notice .noticeContent .noticeInfo {
  display: flex;
  flex-direction: row;
  gap: 1rem;
}

.noticesRelevant .noticesRelevantAllContainer .otherNotices .noticeInEmphasis .notice .noticeContent .noticeInfo p {
  font-size: 0.9rem;
  color: #535353;
}

/* RESUME */
.emphasesNotice .otherEmphases {
  display: flex;
  flex-direction: column;
  gap: 2rem;
  margin-bottom: 2rem;
}

.emphasesNotice .otherEmphases .notice {
  width: 100%;

  display: flex;
  flex-direction: row;
  gap: 1rem;
}

/* noticesRelevant noticeResume */
.noticesRelevant .noticesRelevantAllContainer .otherNotices .noticeResume {
  width: 100%;

  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.noticesRelevant .noticesRelevantAllContainer .otherNotices .noticeResume .notice {
  width: 100%;

  display: flex;
  flex-direction: row;
  gap: 1rem;
}

.noticesRelevant .noticesRelevantAllContainer .otherNotices .noticeResume .notice .imageContainer {
  position: relative;
  width: 100%;
  height: 10rem;
  max-width: 7rem;
  max-height: 4.6rem;
}

.noticesRelevant .noticesRelevantAllContainer .otherNotices .noticeResume .notice .imageContainer img {
  position: absolute;
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.noticesRelevant .noticesRelevantAllContainer .otherNotices .noticeResume .notice .noticeContent {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.noticesRelevant .noticesRelevantAllContainer .otherNotices .noticeResume .notice .noticeContent h1 {
  font-size: 0.9rem;
  color: #494949;
  font-weight: 700;
}

.noticesRelevant .noticesRelevantAllContainer .otherNotices .noticeResume .notice .noticeContent .noticeInfo p {
  font-size: 0.9rem;
  color: #535353;
}

/* SUBSCRIBE */
.noticesRelevant .noticesRelevantAllContainer .otherNotices .subscribe {
  margin: 2rem 0;
  padding: 2rem;
  max-width: 80%;

  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  gap: 1.8rem;

  border: 0.1rem solid #cbcbcb;
}

.noticesRelevant .noticesRelevantAllContainer .otherNotices .subscribe h1 {
  font-size: 1.6rem;
  color: #010101;
  font-weight: 700;
}

.noticesRelevant .noticesRelevantAllContainer .otherNotices .subscribe>p {
  font-size: 0.97rem;
  color: #717171;
  text-align: center;
  line-height: 160%;
}

/* inputContainer */
.noticesRelevant .noticesRelevantAllContainer .otherNotices .subscribe .inputContainer {
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  gap: 1rem;
}

.noticesRelevant .noticesRelevantAllContainer .otherNotices .subscribe .inputContainer input {
  width: 100%;
  padding: 0.8rem 1.2rem;
  font-size: 0.97rem;
  text-align: center;

  border: 0.1rem solid #c6c6c6;
}

.noticesRelevant .noticesRelevantAllContainer .otherNotices .subscribe .inputContainer button {
  width: 100%;
  padding: 0.8rem 1.2rem;
  background-color: var(--main-color);
  color: #ffffff;
  font-weight: 700;
  font-size: 0.97rem;
  text-transform: uppercase;
}

/* checkContainer */
.noticesRelevant .noticesRelevantAllContainer .otherNotices .subscribe .checkContainer {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: row;
  gap: 1rem;
}

.noticesRelevant .noticesRelevantAllContainer .otherNotices .subscribe .checkContainer a>p {
  font-size: 0.9rem;
  color: #717171;
  text-align: center;
  line-height: 160%;
}

.videosList {
  width: 100%;
  padding: 2.6rem;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: #121212;
}

.videosList .allContainer {
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: center;
}

.videosList .videoPlay {
  width: 100%;
  max-width: 780px;
  height: 460px;
}

.videosList ul#playlist {
  width: 100%;
  max-width: 25rem;
  height: 460px;
  overflow-y: scroll;
  display: flex;
  flex-direction: column;
  list-style: none;
}

.videosList ul#playlist li {
  list-style: none;

}

.videosList ul#playlist li>a {
  color: #fff;
  padding: 0.5rem 0.5rem;
  display: flex;
  flex-direction: row;
  gap: 1rem;
}

.videosList ul#playlist li a>.infoContainer {
  display: flex;
  flex-direction: column;
  gap: .8rem;

}

.videosList ul#playlist li.active a {
  color: blue;
  background-color: #cfcfcf5b;
  border-left: 0.4rem solid var(--main-color);
}

.videosList ul#playlist li .containerImage {
  width: 8rem;
  height: 4.8rem;
  position: relative;
  overflow: hidden;
}

.videosList ul#playlist li .containerImage img {
  position: absolute;
  width: 100%;
  height: 100%;
  overflow: hidden;
  object-fit: cover;

  transition: 1s ease;
}

.videosList ul#playlist li>a>.infoContainer h4 {
  font-size: 1rem;
  color: #fff;
  font-weight: 700;

  overflow: hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  /* number of lines to show */
  line-clamp: 2;
  -webkit-box-orient: vertical;
}

.videosList ul#playlist li>a .infoContainer p {
  font-size: 0.8rem;
  color: #fff;

  overflow: hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  /* number of lines to show */
  line-clamp: 2;
  -webkit-box-orient: vertical;
}


@media (max-width: 844px) {
  .homeContainer .swiper .slide .slideInfo h1 {
    font-size: 3rem;
  }

  .homeContainer .swiper .slide .slideInfo p {
    max-width: 100%;
  }
}

@media (max-width: 604px) {
  .homeContainer .swiper .slide .slideInfo h1 {
    font-size: 2rem;
  }
}

@media (max-width: 604px) {
  .homeContainer .swiper .slide .slideInfo p {
    font-size: 1rem;
  }
}

@media (min-width: 1318px) {
  .moreNotices .moreNoticesAllContainer .moreNoticesContainer .contentMoreNotice>a .notice {
    width: 100%;
    max-width: 26rem;
    min-height: 14rem;
    display: flex;
    flex-direction: column;
    gap: 1rem;
  }
}

@media (max-width: 1318px) {
  .moreNotices .moreNoticesAllContainer .moreNoticesContainer .contentMoreNotice {
    display: flex;
    flex-direction: column;
    gap: 2rem;
    margin-top: 2rem;
  }

  .moreNotices .moreNoticesAllContainer .moreNoticesContainer .contentMoreNotice>a .notice .imageContainer {
    position: relative;
    width: 100%;
    height: 20rem;
  }
}

@media (max-width: 988px) {
  .lastNotices .lastNoticesAllContainer {
    display: flex;
    flex-direction: column;
    gap: 2.4rem;
  }

  .moreNotices .moreNoticesAllContainer {
    display: flex;
    flex-direction: column;
    gap: 2.4rem;
  }
}

@media (max-width: 1420px) {
  .emphasesNotice .emphases {
    position: relative;
    width: 100%;
    max-width: 28rem;
    flex: 1;
    display: flex;
  }
}

@media (max-width: 866px) {
  .noticesRelevant .noticesRelevantAllContainer {
    display: flex;
    flex-direction: column;
    gap: 2.4rem;
  }
}

@media (max-width: 1256px) {
  .emphasesNoticeAllContainer {
    display: flex;
    flex-direction: column;
  }

  .emphasesNotice .emphases {
    position: relative;
    width: 100%;
    max-width: 100%;
    flex: 1;
    display: flex;
  }

  .emphasesNotice .emphases .imageContainer {
    width: 100%;
    height: 26rem;
  }
}
</style>

<main class="homeContainer">

  <?php $this->start('publicity'); ?>

  <section class="swiper">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
      <!-- Slides -->
      <div class="swiper-slide">
        <section class="slide" id="slide">
          <section class="publicity">
            <div class="container">
              <div class='containerImage'>
                <img src=" <?= urlProject(FOLDER_BASE . BASE_IMG . "/primaryPublicity.jpg") ?>" alt="">
              </div>
            </div>
          </section>
        </section>
      </div>
      <?php foreach ($publiciteis_1_3 as $data) : ?>
      <div class="swiper-slide">
        <section class="slide" id="slide">
          <section class="publicity">
            <div class="container">
              <div class='containerImage'>
                <img src=" <?= $data['image_publicity'] ?>" alt="">
              </div>
            </div>
          </section>
        </section>
      </div>
      <?php endforeach ?>
    </div>

  </section>

  <?php $this->end(); ?>

  <section class="choosesEditors">
    <div class="container">
      <div class="choosesContainer">
        <?php
        foreach ($choose_editors as $data) :


          $author_id = $data['author_id'];
          $author_name;

          $get_author = $pdo->prepare("SELECT * FROM author where id=?");
          $get_author->execute(array($author_id));

          foreach ($get_author as $author) :
            $author_name = $author['name_author'];
          endforeach;
        ?>
        <a href="<?= urlProject(BASE_DETAILSNEWS . "/" . $data['id']) ?>">
          <div class="choose">
            <div class='containerImage'>
              <img src="<?= $data['image_news'] ?>" alt="">
            </div>

            <div class="textContainer">
              <p><?= $data['title_news'] ?></p>
              <span> <i class="fa-solid fa-calendar-days"></i> <?= $data['date_create'] ?></span>
            </div>
          </div>
        </a>
        <?php endforeach ?>
      </div>
    </div>
  </section>

  <section class="emphasesNotice">
    <div class="container">
      <div class="titleSectionContainer">
        <h1> <span>Em Destaque</span> </h1>
      </div>

      <div class="emphasesNoticeAllContainer">
        <?php

        foreach ($emphasis_news1 as $data) :
          $author_id = $data['author_id'];
          $author_name;

          $get_author = $pdo->prepare("SELECT * FROM author where id=$author_id");
          $get_author->execute();

          foreach ($get_author as $author) :
            $author_name = $author['name_author'];
          endforeach;

        ?>
        <a href="<?= urlProject(BASE_DETAILSNEWS . "/" . $data['id']) ?>">
          <div class="emphases">
            <div class="imageContainer">
              <img src=" <?= $data['image_news'] ?> " alt="">
            </div>

            <div class="noticeContent">
              <a href="<?= urlProject(BASE_DETAILSNEWS . "/" . $data['id']) ?>">
                <h1> <?= $data['title_news'] ?> </h1>

                <div class="noticeInfo">
                  <p><i class="fa-solid fa-user"></i> <strong> <?= $author_name ?> </strong> - <span> <i
                        class="fa-solid fa-calendar-days"></i> <?= $data['date_create'] ?> </span></p>

                </div>
              </a>
            </div>
          </div>
        </a>
        <?php endforeach ?>

        <div class="otherEmphases">
          <?php
          $author_id = $data['author_id'];
          $author_name;

          $get_author = $pdo->prepare("SELECT * FROM author where id=$author_id");
          $get_author->execute();

          foreach ($get_author as $author) :
            $author_name = $author['name_author'];
          endforeach;

          foreach ($emphasis_newsList as $data) :

          ?>
          <a href="<?= urlProject(BASE_DETAILSNEWS . "/" . $data['id']) ?>">
            <div class="notice">
              <div class="imageContainer">
                <img src="<?= $data['image_news'] ?>" alt="">
              </div>

              <div class="noticeContent">
                <h1><?= $data['title_news'] ?></h1>

                <div class="noticeInfo">
                  <p><i class="fa-solid fa-user"></i> <strong><?= $author_name ?></strong> - <span><i
                        class="fa-solid fa-calendar-days"></i> <?= $data['date_create'] ?></span></p>

                </div>

              </div>
            </div>
          </a>
          <?php endforeach ?>
        </div>

      </div>
    </div>
  </section>

  <section class="lastNotices">
    <div class="container">
      <div class="lastNoticesAllContainer">

        <div class="lastNoticesContainer">
          <div class="titleSectionContainer">
            <h1>Ultimas <span>Noticias</span> </h1>
          </div>

          <?php
          foreach ($lastNews as $data) :

            $author_id = $data['author_id'];
            $author_name;

            $get_author = $pdo->prepare("SELECT * FROM author where id=$author_id");
            $get_author->execute();

            foreach ($get_author as $author) :
              $author_name = $author['name_author'];
            endforeach;

          ?>
          <a href="<?= urlProject(BASE_DETAILSNEWS . "/" . $data['id']) ?>">
            <div class="notice">
              <div class="imageContainer">
                <img src="<?= $data['image_news'] ?>" alt="">
              </div>

              <div class="noticeContent">
                <h1><?= $data['title_news'] ?></h1>

                <div class="noticeInfo">
                  <p><i class="fa-solid fa-user"></i> <strong><?= $author_name ?></strong> - <span><i
                        class="fa-solid fa-calendar-days"></i> <?= $data['date_create'] ?></span></p>

                </div>

                <p><?= $data['resume_news'] ?></p>
              </div>
            </div>
          </a>
          <?php endforeach ?>
        </div>

        <div class="otherNotices">
          <div class="categoryTItleSectionContainer">
            <h1>Destaques</h1>
          </div>

          <div class="noticeInEmphasis">
            <?php
            foreach ($rightNews1 as $data) :
              $author_id = $data['author_id'];
              $author_name;

              $get_author = $pdo->prepare("SELECT * FROM author where id=$author_id");
              $get_author->execute();

              foreach ($get_author as $author) :
                $author_name = $author['name_author'];
              endforeach;

            ?>
            <a href="<?= urlProject(BASE_DETAILSNEWS . "/" . $data['id']) ?>">
              <div class="notice">
                <div class="imageContainer">
                  <img src="<?= $data['image_news'] ?>" alt="">
                </div>

                <div class="noticeContent">
                  <h1><?= $data['title_news'] ?></h1>

                  <div class="noticeInfo">
                    <p><i class="fa-solid fa-user"></i> <strong><?= $author_name ?></strong> -
                      <span><?= $data['date_create'] ?></span>
                    </p>

                  </div>

                  <p><?= $data['resume_news'] ?></p>
                </div>
              </div>
              <a href="<?= urlProject(BASE_DETAILSNEWS . "/" . $data['id']) ?>">
                <?php endforeach ?>
          </div>

          <div class="noticeResume">
            <?php
            foreach ($rightNewsList1 as $data) :
              $author_id = $data['author_id'];
              $author_name;

              $get_author = $pdo->prepare("SELECT * FROM author where id=$author_id");
              $get_author->execute();

              foreach ($get_author as $author) :
                $author_name = $author['name_author'];
              endforeach;

            ?>
            <a href="<?= urlProject(BASE_DETAILSNEWS . "/" . $data['id']) ?>">
              <div class="notice">
                <div class="imageContainer">
                  <img src="<?= $data['image_news'] ?>" alt="">
                </div>

                <div class="noticeContent">
                  <h1><?= $data['title_news'] ?></h1>

                  <div class="noticeInfo">
                    <p><?= $data['date_create'] ?></p>
                  </div>

                </div>
              </div>
              <a href="<?= urlProject(BASE_DETAILSNEWS . "/" . $data['id']) ?>">
                <?php endforeach ?>

          </div>

        </div>

      </div>
    </div>
  </section>

  <section class="moreNotices">
    <div class="container">
      <div class="moreNoticesAllContainer">

        <div class="moreNoticesContainer">
          <div class="titleSectionContainer">
            <h1>Mais <span>Noticias</span> </h1>
          </div>

          <div class="contentMoreNotice">
            <?php
            $author_id = $data['author_id'];
            $author_name;

            $get_author = $pdo->prepare("SELECT * FROM author where id=$author_id");
            $get_author->execute();

            foreach ($get_author as $author) :
              $author_name = $author['name_author'];
            endforeach;

            foreach ($moreNews1 as $data) :
            ?>
            <a href="<?= urlProject(BASE_DETAILSNEWS . "/" . $data['id']) ?>">
              <div class="notice">
                <div class="imageContainer">
                  <img src="<?= $data['image_news'] ?>" alt="">
                </div>

                <div class="noticeContent">
                  <h1><?= $data['title_news'] ?></h1>

                  <div class="noticeInfo">
                    <p><i class="fa-solid fa-user"></i> <strong><?= $author_name ?></strong> - <span><i
                          class="fa-solid fa-calendar-days"></i> <?= $data['date_create'] ?></span></p>

                  </div>

                  <p><?= $data['resume_news'] ?></p>
                </div>
              </div>
            </a>
            <?php endforeach ?>

            <div class="noticeResume">
              <?php
              $author_id = $data['author_id'];
              $author_name;

              $get_author = $pdo->prepare("SELECT * FROM author where id=$author_id");
              $get_author->execute();

              foreach ($get_author as $author) :
                $author_name = $author['name_author'];
              endforeach;

              foreach ($moreNewsList1 as $data) :
              ?>
              <a href="<?= urlProject(BASE_DETAILSNEWS . "/" . $data['id']) ?>">
                <div class="notice">
                  <div class="imageContainer">
                    <img src="<?= $data['image_news'] ?>" alt="">
                  </div>
                  <div class="noticeContent">
                    <h1><?= $data['title_news'] ?></h1>

                    <div class="noticeInfo">
                      <p><?= $data['resume_news'] ?></p>
                    </div>
                    <div class="noticeInfo">
                      <p><i class="fa-solid fa-calendar-days"></i> <?= $data['date_create'] ?></p>
                    </div>


                  </div>
                </div>
              </a>
              <?php endforeach ?>

            </div>
          </div>

        </div>

        <div class="otherNotices">
          <div class="categoryTItleSectionContainer">
            <h1>Economia </h1>
          </div>

          <div class="noticeInEmphasis">
            <?php
            foreach ($rightNewsList2 as $data) :
              $author_id = $data['author_id'];
              $author_name;

              $get_author = $pdo->prepare("SELECT * FROM author where id=$author_id");
              $get_author->execute();

              foreach ($get_author as $author) :
                $author_name = $author['name_author'];
              endforeach;

            ?>
            <a href="<?= urlProject(BASE_DETAILSNEWS . "/" . $data['id']) ?>">
              <div class="notice">
                <div class="imageContainer">
                  <img src="<?= $data['image_news'] ?>" alt="">
                </div>

                <div class="noticeContent">
                  <strong> <?= $data['id'] ?> </strong>

                  <div class="noticeContent_left">
                    <h1><?= $data['title_news'] ?></h1>

                    <div class="noticeInfo">
                      <p><i class="fa-solid fa-user"></i> <strong><?= $author_name ?></strong> -
                        <span><?= $data['date_create'] ?></span>
                      </p>

                    </div>
                  </div>

                </div>
              </div>
            </a>
            <?php endforeach ?>

          </div>
        </div>

      </div>
    </div>
  </section>


  <section class="publicitySwiper">
    <div class="swiper-wrapper">
      <!-- Slides -->
      <?php foreach ($publiciteis_3_6 as $data) : ?>
      <div class="swiper-slide">
        <section class="slide" id="slide">
          <section class="publicity">
            <div class="container">
              <div class='containerImage'>
                <img src=" <?= $data['image_publicity'] ?>" alt="">
              </div>
            </div>
          </section>
        </section>
      </div>
      <?php endforeach ?>
    </div>
  </section>


  <section class="noticesRelevant">
    <div class="container">
      <div class="noticesRelevantAllContainer">

        <div class="noticesRelevantContainer">
          <div class="titleSectionContainer">
            <h1>Noticias <span>Relevantes</span> </h1>
          </div>

          <div class="allNotices">
            <?php

            foreach ($relevant_news as $data) :

              $author_id = $data['author_id'];
              $author_name;

              $get_author = $pdo->prepare("SELECT * FROM author where id=?");
              $get_author->execute(array($author_id));

              foreach ($get_author as $author) :
                $author_name = $author['name_author'];
              endforeach;
            ?>
            <a href="<?= urlProject(BASE_DETAILSNEWS . "/" . $data['id']) ?>">
              <div class="notice">
                <div class="imageContainer">
                  <img src="<?= $data['image_news'] ?>" alt="">
                </div>

                <div class="noticeContent">
                  <h1><?= $data['title_news'] ?></h1>

                  <div class="noticeInfo">
                    <p><i class="fa-solid fa-user"></i> <strong><?= $author_name ?></strong> - <span><i
                          class="fa-solid fa-calendar-days"></i> <?= $data['date_create'] ?></span></p>

                  </div>

                  <p> <?= $data['resume_news'] ?></p>
                </div>
              </div>
            </a>
            <?php endforeach ?>
          </div>

        </div>

        <div class="otherNotices">
          <div class="categoryTItleSectionContainer">
            <h1>Convivendo com o Covid</h1>
          </div>

          <div class="noticeInEmphasis">
            <?php
            foreach ($rightNews3 as $data) :
              $author_id = $data['author_id'];
              $author_name;

              $get_author = $pdo->prepare("SELECT * FROM author where id=$author_id");
              $get_author->execute();

              foreach ($get_author as $author) :
                $author_name = $author['name_author'];
              endforeach;

            ?>
            <a href="<?= urlProject(BASE_DETAILSNEWS . "/" . $data['id']) ?>">
              <div class="notice">
                <div class="imageContainer">
                  <img src="<?= $data['image_news'] ?>" alt="">
                </div>

                <div class="noticeContent">
                  <h1><?= $data['title_news'] ?></h1>

                  <div class="noticeInfo">
                    <p><i class="fa-solid fa-user"></i> <strong><?= $author_name ?></strong> -
                      <span><?= $data['date_create'] ?></span>
                    </p>

                  </div>

                  <p><?= $data['resume_news'] ?></p>
                </div>
              </div>
            </a>
            <?php endforeach ?>
          </div>

          <div class="noticeResume">
            <?php
            foreach ($rightNewsList3 as $data) :
              $author_id = $data['author_id'];
              $author_name;

              $get_author = $pdo->prepare("SELECT * FROM author where id=$author_id");
              $get_author->execute();

              foreach ($get_author as $author) :
                $author_name = $author['name_author'];
              endforeach;

            ?>
            <a href="<?= urlProject(BASE_DETAILSNEWS . "/" . $data['id']) ?>">
              <div class="notice">
                <div class="imageContainer">
                  <img src="<?= $data['image_news'] ?>" alt="">
                </div>

                <div class="noticeContent">
                  <h1><?= $data['title_news'] ?></h1>

                  <div class="noticeInfo">
                    <p><?= $data['date_create'] ?></p>
                  </div>

                </div>
              </div>
            </a>
            <?php endforeach ?>
          </div>

          <form method="post" action="<?= urlProject(CONTROLLERS . "/newslettersControllers.php") ?>" class="subscribe">
            <h1>Deixe o seu email</h1>

            <p>
              E receba notificações com as ultimas atualizações da Tv One.
            </p>

            <div class="inputContainer">
              <input type="text" name="email" placeholder="Seu endereço de email">
              <button type="submit" name="send_email">Se inscrever</button>
            </div>

            <div class="checkContainer">
              <p>
                <input type="checkbox" name="" id="">
                Ao se inscrever, você concorda com nossos termos e nosso acordo de
                Política de Privacidade .
                </a>
              </p>
            </div>
          </form>
        </div>

      </div>
    </div>
  </section>

  <section class="videosList">
    <div class="container">
      <div class="titleSectionContainer">
        <h1> <span>Videos</span> </h1>
      </div>
      <br>
      <br>

      <div class="allContainer">
        <?php
        foreach ($videoInit as $data) :
          $videoURL = $data['link_video'];
          $convertedURL = str_replace("watch?v=", "embed/", $videoURL);
        ?>
        <iframe id="video" class="embed-responsive-item videoPlay" src="<?= $convertedURL; ?>?playsinline=1&rel=0"
          frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
          allowfullscreen></iframe>
        <?php endforeach ?>


        <ul id="playlist" style="list-style: none;">
          <?php
          foreach ($video_list as $data) :
          ?>
          <li>
            <a href="<?= $data['link_video']; ?>">
              <div class='containerImage'>
                <img src="<?= $data['cover_video'] ?>" alt="">
              </div>
              <div class="infoContainer">
                <h4><?= $data['title_video'] ?></h4>
                <p><?= $data['time_video'] ?> <br> <span><?= $data['date_create'] ?></span> </p>
              </div>
            </a>
          </li>
          <?php endforeach ?>
        </ul>
      </div>
    </div>
  </section>

  <section class="publicitySwiper">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
      <!-- Slides -->
      <?php foreach ($publiciteis_7_10 as $data) : ?>
      <div class="swiper-slide">
        <section class="slide" id="slide">
          <section class="publicity">
            <div class="container">
              <div class='containerImage'>
                <img src=" <?= $data['image_publicity'] ?>" alt="">
              </div>
            </div>
          </section>
        </section>
      </div>
      <?php endforeach ?>
    </div>

  </section>

  <section class="choosesEditors">
    <div class="container">
      <div class="titleSectionContainer">
        <h1> <span>Baú</span> </h1>
      </div>

      <div class="choosesContainer">
        <?php
        foreach ($bau as $data) :


          $author_id = $data['author_id'];
          $author_name;

          $get_author = $pdo->prepare("SELECT * FROM author where id=?");
          $get_author->execute(array($author_id));

          foreach ($get_author as $author) :
            $author_name = $author['name_author'];
          endforeach;
        ?>
        <a href="<?= urlProject(BASE_DETAILSNEWS . "/" . $data['id']) ?>">
          <div class="choose">
            <div class='containerImage'>
              <img src="<?= $data['image_news'] ?>" alt="">
            </div>

            <div class="textContainer">
              <p><?= $data['title_news'] ?></p>
              <span> <i class="fa-solid fa-calendar-days"></i> <?= $data['date_create'] ?></span>
            </div>
          </div>
        </a>
        <?php endforeach ?>
      </div>
    </div>
  </section>

  <br>
  <br>
  <br>
  <br>
  <br>
</main>

<script type="text/javascript">
var corrente = 0;
var video = $("#video");
var playlist = $("#playlist");
var tracks = playlist.find("li a");
var len = tracks.length - 1;

var playlist = $("#playlist");
var tracks = playlist.find("li a");

playlist.find("a").click(function(e) {
  e.preventDefault();

  link = $(this);
  corrente = link.parent().index();
  run(link, video[0])

})

video[0].addEventListener("ended", function(e) {
  corrente++;
  if (corrente = len) {
    corrente = 0;
    link = playlist.find("a")[0];
  } else {
    link = playlist.find("a")[corrente]
  }
  run($(link), video[0])

})

function run(link, player) {
  let getURL = link.attr("href");
  let newURL = getURL.replace("watch?v=", "embed/");
  $('iframe').attr("src", newURL)

  par = link.parent();
  par.addClass("active").siblings().removeClass("active");
  player.load();
  player.play();
}
</script>

<script type="text/javascript" src="<?= urlProject(FOLDER_BASE . BASE_JS . "/homeScripts.js") ?>">
</script>