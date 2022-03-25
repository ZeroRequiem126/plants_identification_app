<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>ホーム</title>
</head>
<body>

<?php include("templates/header.html"); ?>
    
<div class="jumbotron">
    <div class="container">
        <p>葉っぱで見分ける樹木検索サイト『<span class="intro-emphasis1">山の恵みぺディア</span>』へようこそ。</p><br>
        <p>当サイトでは、<span class="intro-emphasis2">日常生活に役立つ樹木情報</span>を紹介しています。</p><br>
        <p>「この木の開花時期はいつ？」「食べれる実のなる木？」「木の実の食べ方は？」<br>そんな疑問にお答えします。</p><br>
        <p>検索した木は、お気に入り登録したり、メモを残すこともできます。</p>
        <br>
            <div class="balloon">
                <div class="faceicon">
                <img src="img/芋虫.png" width="300">
                </div>
                <h4 class="says">葉っぱをよく観察して、<br>「7つの特徴」を下から選んでね！</h4>
            </div>
        <!-- <a class="btn btn-primary btn-lg btn-danger" href="#category-1" role="button" id="get-started">葉っぱを調べる</a> -->
    </div>
</div>

<form action="list.php" method="GET">

    <div class="category bg-green" id="category-1">
        <h2 class="txt-white">1. 葉っぱのつき方は？</h2>
        <ul>
            <li class="category-item bg-white txt-black">
                <img src="img/2/1.png" id="leaf-attachment-1">
                <p class="category-name">1.対生</p>
            </li>
    
            <li class="category-item bg-white txt-black">
                <img src="img/2/2.png" id="leaf-attachment-2">
                <p class="category-name">2.輪生</p>
            </li>
            <li class="category-item bg-white txt-black">
                <img src="img/2/3.png" id="leaf-attachment-3">
                <p class="category-name">3.互生</p>
            </li>
            <li class="category-item bg-white txt-black">
                <img src="img/2/4.png" id="leaf-attachment-4">
                <p class="category-name">4.コクサギ型の互生</p>
            </li>
            <li class="category-item bg-white txt-black">
                <img src="img/mark_question.png" class="mark-question">
                <p class="category-name">よくわからない</p>
            </li>
        </ul>

        <div class="form">
            <select name="leaf_attachment">
                <option value="">当てはまるものを選択してください</option>
                <option value="1">1. 対生</option>
                <option value="2">2. 互生</option>
                <option value="3">3. 輪生</option>
                <option value="4">4. コクサギ型の互生</option>
                <option value="">5. わからない</option>
            </select>
        </div>
    </div>

    <div class="category bg-white" id="category-2">
        <h2 class="txt-green" id="category-2-title">2. 単葉？複葉？</h2>
        <ul>
            <li class="category-item bg-grey txt-black">
                <img src="img/3/1.png" id="leaf-pattern-1">
                <p class="category-name">1.単葉</p>
            </li>
    
            <li class="category-item bg-grey txt-black">
                <img src="img/3/2.png" id="leaf-pattern-2">
                <p class="category-name">2.偶数羽状複葉</p>
            </li>
            <li class="category-item bg-grey txt-black">
                <img src="img/3/3.png" id="leaf-pattern-3">
                <p class="category-name">3.奇数羽状複葉</p>
            </li>
            <li class="category-item bg-grey txt-black">
                <img src="img/3/4.png" id="leaf-pattern-4">
                <p class="category-name">4.掌状</p>
            </li>
            <li class="category-item bg-grey txt-black">
                <img src="img/3/5.png" id="leaf-pattern-5">
                <p class="category-name">5.出複葉</p>
            </li>
            <li class="category-item bg-grey txt-black">
                <img src="img/mark_question.png" class="mark-question">
                <p class="category-name">よくわからない</p>
            </li>
        </ul>

        <div class="form">
            <select name="leaf_pattern">
                <option value="">当てはまるものを選択してください</option>
                <option value="1">1. 単葉</option>
                <option value="2">2. 偶数羽状複葉</option>
                <option value="3">3. 奇数羽状複葉</option>
                <option value="4">4. 掌状</option>
                <option value="5">5. 出複葉</option>
                <option value="">6. よくわからない</option>
            </select>
        </div>
    </div>

    <div class="category bg-green" id="category-3">
        <h2 class="txt-white">3. 単葉の形は？</h2>
        <ul>
            <li class="category-item bg-white txt-black">
                <img src="img/4/1.png" id="leaf-shape-1">
                <p class="category-name">1.心形</p>
            </li>
            <li class="category-item bg-white txt-black">
                <img src="img/4/2.png" id="leaf-shape-2">
                <p class="category-name">2.三角形</p>
            </li>
            <li class="category-item bg-white txt-black">
                <img src="img/4/3.png" id="leaf-shape-3">
                <p class="category-name">3.ひし形</p>
            </li>
            <li class="category-item bg-white txt-black">
                <img src="img/4/4.png" id="leaf-shape-4">
                <p class="category-name">4.円形</p>
            </li>
            <li class="category-item bg-white txt-black">
                <img src="img/4/5.png" id="leaf-shape-5">
                <p class="category-name">5.楕円形</p>
            </li>
            <li class="category-item bg-white txt-black">
                <img src="img/4/6.png" id="leaf-shape-6">
                <p class="category-name">6.長楕円形</p>
            </li>
            <li class="category-item bg-white txt-black">
                <img src="img/4/7.png" id="leaf-shape-7">
                <p class="category-name">7.卵形</p>
            </li>
            <li class="category-item bg-white txt-black">
                <img src="img/4/8.png" id="leaf-shape-8">
                <p class="category-name">8.倒卵形</p>
            </li>
            <li class="category-item bg-white txt-black">
                <img src="img/4/9.png" id="leaf-shape-9">
                <p class="category-name">9.抜針形</p>
            </li>
            <li class="category-item bg-white txt-black">
                <img src="img/4/10.png" id="leaf-shape-10">
                <p class="category-name">10.倒抜針形</p>
            </li>
            <li class="category-item bg-white txt-black">
                <img src="img/4/11.png" id="leaf-shape-11">
                <p class="category-name">11.広線形</p>
            </li>
            <li class="category-item bg-white txt-black">
                <img src="img/mark_question.png" class="mark-question">
                <p class="category-name">わからない</p>
            </li>
        </ul>

        <div class="form">
            <select name="leaf_shape">
                <option value="">当てはまるものを選択してください</option>
                <option value="1">1. 心形</option>
                <option value="2">2. 三角形</option>
                <option value="3">3. ひし形</option>
                <option value="4">4. 円形</option>
                <option value="5">5. 楕円形</option>
                <option value="6">6. 長楕円形</option>
                <option value="7">7. 卵形</option>
                <option value="8">8. 倒卵形</option>
                <option value="9">9. 抜針形</option>
                <option value="10">10. 倒抜針形</option>
                <option value="11">11. 広線形</option>
                <option value="12">5. よくわからない</option>
            </select>
        </div>
    </div>

    <div class="category bg-white" id="category-4">
        <h2 class="txt-green">4. 葉の切れ込みは？</h2>
        <ul>
            <li class="category-item bg-grey txt-black">
                <img src="img/5/1.png" id="leaf-blade-1">
                <p class="category-name">1.切れ込みなし</p>
            </li>
    
            <li class="category-item bg-grey txt-black">
                <img src="img/5/2.png" id="leaf-blade-2">
                <p class="category-name">2.３～５裂</p>
            </li>
            <li class="category-item bg-grey txt-black">
                <img src="img/5/3.png" id="leaf-blade-3">
                <p class="category-name">3.５～７裂</p>
            </li>
            <li class="category-item bg-grey txt-black">
                <img src="img/5/4.png" id="leaf-blade-4">
                <p class="category-name">4.７～１１裂</p>
            </li>
            <li class="category-item bg-grey txt-black">
                <img src="img/5/5.png" id="leaf-blade-5">
                <p class="category-name">5.羽状裂</p>
            </li>
            <li class="category-item bg-grey txt-black">
                <img src="img/mark_question.png" class="mark-question">
                <p class="category-name">わからない</p>
            </li>
        </ul>

        <div class="form">
            <select name="leaf_blade">
                <option value="">当てはまるものを選択してください</option>
                <option value="1">1. 切れ込みなし</option>
                <option value="2">2. 3〜5裂</option>
                <option value="3">3. 5～7裂</option>
                <option value="4">4. 7～1裂</option>
                <option value="5">5. 羽状裂</option>
                <option value="">6. よくらからない</option>
            </select>
        </div>
    </div>

    <div class="category bg-green" id="category-5">
        <h2 class="txt-white">5. 葉縁の状態は？</h2>
        <ul>
            <li class="category-item bg-white txt-black">
                <img src="img/6/1.png" id="leaf-edge-1">
                <p class="category-name">1.全縁</p>
            </li>
            <li class="category-item bg-white txt-black">
                <img src="img/6/2.png" id="leaf-edge-2">
                <p class="category-name">2.鋸歯縁</p>
            </li>
            <li class="category-item bg-white txt-black">
                <img src="img/6/3.png" id="leaf-edge-3">
                <p class="category-name">3.鈍鋸歯縁</p>
            </li>
            <li class="category-item bg-white txt-black">
                <img src="img/6/4.png" id="leaf-edge-4">
                <p class="category-name">4.重鋸歯縁</p>
            </li>
            <li class="category-item bg-white txt-black">
                <img src="img/6/5.png" id="leaf-edge-5">
                <p class="category-name">5.波状縁</p>
            </li>
            <li class="category-item bg-white txt-black">
                <img src="img/6/6.png" id="leaf-edge-6">
                <p class="category-name">6.歯牙縁</p>
            </li>
            <li class="category-item bg-white txt-black">
                <img src="img/6/7.png" id="leaf-edge-7">
                <p class="category-name">7.一部鋸歯</p>
            </li>
            <li class="category-item bg-white txt-black">
                <img src="img/mark_question.png" class="mark-question">
                <p class="category-name">わからない</p>
            </li>
        </ul>

        <div class="form">
            <select name="leaf_edge">
                <option value="">当てはまるものを選択してください</option>
                <option value="1">1. 全縁</option>
                <option value="2">2. 鋸歯縁</option>
                <option value="3">3. 鈍鋸歯縁</option>
                <option value="4">4. 重鋸歯縁</option>
                <option value="5">5. 波状縁</option>
                <option value="6">6. 歯牙縁</option>
                <option value="7">7. 一部鋸歯</option>
                <option value="">8. よくわからない</option>
            </select>
        </div>

    </div>

    <div class="category bg-white" id="category-6">
        <h2 class="txt-green">6. 葉脈の走り方は？</h2>
        <ul>
            <li class="category-item bg-grey txt-black">
                <img src="img/7/1.png" id="leaf-vein-1">
                <p class="category-name">1.羽状脈</p>
            </li>
    
            <li class="category-item bg-grey txt-black">
                <img src="img/7/2.png" id="leaf-vein-2">
                <p class="category-name">2.平行脈</p>
            </li>
            <li class="category-item bg-grey txt-black">
                <img src="img/7/3.png" id="leaf-vein-3">
                <p class="category-name">3.３行脈</p>
            </li>
            <li class="category-item bg-grey txt-black">
                <img src="img/7/4.png" id="leaf-vein-4">
                <p class="category-name">4.掌状脈</p>
            </li>
            <li class="category-item bg-grey txt-black">
                <img src="img/mark_question.png" class="mark-question">
                <p class="category-name">わからない</p>
            </li>
        </ul>

        <div class="form">
            <select name="leaf_vein">
                <option value="">当てはまるものを選択してください</option>
                <option value="1">1. 羽状脈</option>
                <option value="2">2. 羽状と３行脈の間</option>
                <option value="3">3. ３行脈</option>
                <option value="4">4. 掌状脈</option>
                <option value="">5. よくらからない</option>
            </select>
        </div>
    </div>

    <div class="category bg-green" id="category-7">
        <h2 class="txt-white">7. 側脈の先端の形は？</h2>
        <ul>
            <li class="category-item bg-white txt-black">
                <img src="img/8/1.png" id="leaf-lateral-vein-1">
                <p class="category-name">1.枝別れせず<br>鋸歯に入る</p>
            </li>
    
            <li class="category-item bg-white txt-black">
                <img src="img/8/2.png" id="leaf-lateral-vein-2">
                <p class="category-name">2.枝別れして<br>鋸歯に入る</p>
            </li>
            <li class="category-item bg-white txt-black">
                <img src="img/8/3.png" id="leaf-lateral-vein-3">
                <p class="category-name">3.枝別れせず<br>縁に達しない</p>
            </li>
            <li class="category-item bg-white txt-black">
                <img src="img/8/4.png" id="leaf-lateral-vein-4">
                <p class="category-name">4.枝別れして<br>縁に達しない</p>
            </li>
            <li class="category-item bg-white txt-black">
                <img src="img/mark_question.png" class="mark-question">
                <p class="category-name">わからない</p>
            </li>
        </ul>

        <div class="form">
            <select name="leaf_lateral_vein">
                <option value="">当てはまるものを選択してください</option>
                <option value="1">1. 枝別れせず、鋸歯に入る</option>
                <option value="2">2. 枝別れして、鋸歯に入る</p></option>
                <option value="3">3. 枝別れせず、縁に達しない</option>
                <option value="4">4. 枝別れして、縁に達しない</option>
                <option value="">5. よくらからない</option>
            </select>
        </div>
    </div>

    <div class="search-button bg-white" id="js-search-button">
            <input type="submit" value ="検索" class="bg-green txt-white">
    </div>
</form>

<?php include("templates/footer.html"); ?>

<div id="js-scroll-top" class="scroll-top not-active">TOP</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>
<script src="main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>