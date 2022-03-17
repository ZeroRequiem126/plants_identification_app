<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>この木なんの木？</title>
</head>
<body>
    <header id="top">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php" id="site-title"><img src="img/leaf.png" width="50" height="50"> この木なんの木？</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                    <a class="nav-link menu-item" href="#">検索する</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    
    <div class="jumbotron">
        <div class="container">
            <h1>「これってなんの木なんだろう？」</h1>
            <p>散歩や登山中に見かける「知らない木」。<br>
                パッと見ただけで特定するのは、なかなか難しいです。<br><br>
                このサイトでは、「葉っぱの8つの特徴」を選択することで、木の種類を鑑定します。<br><br>
                また、木の個別ページでは、<br><br>「この木の実は食べられるか」<br>「花見のタイミング」<br><br>といった豆知識をご紹介しています。
            </p>
            <a class="btn btn-primary btn-lg btn-danger" href="#first-category" role="button" id="get-started">葉っぱを調べる</a>
        </div>
    </div>

    <form action="list.php" method="GET">
        
        <div class="category-1 bg-white" id="first-category">
            <h2 class="txt-green">1. 木の大きさは？</h2>
            <ul>
                <li class="category-item bg-grey txt-black">
                    <img src="img/1/2.png" id="tree-size-1">
                    <p class="category-name">1. 高木<br><span>(3m以上)</span></p>
                </li>
        
                <li class="category-item bg-grey txt-black">
                    <img src="img/1/2.png" id="tree-size-2">
                    <p class="category-name">2. 低木<br><span>(3m以下)</span></p>
                </li>
                <li class="category-item bg-grey txt-black">
                    <img src="img/1/2.png" id="tree-size-3">
                    <p class="category-name">3. 矮小低木<br><span>(50cm以下)</span></p>
                </li>
                <li class="category-item bg-grey txt-black">
                    <img src="img/1/4.png" id="tree-size-4">
                    <p class="category-name">4. つる<br><span>(寄生植物)</span></p>
                </li>
                <li class="category-item bg-grey txt-black">
                    <img src="img/mark_question.png" class="mark-question">
                    <p class="category-name">5. わからない</p>
                </li>
            </ul>

            <div class="form">
                <select name="tree_height">
                    <option value="">当てはまるものを選択してください</option>
                    <option value="1">1. 高木</option>
                    <option value="2">2. 低木</option>
                    <option value="3">3. 矮小低木</option>
                    <option value="4">4. つる</option>
                    <option value="">5. わからない</option>
                </select>
            </div>
        </div>

        <div class="category-2 bg-green">
            <h2 class="txt-white">2. 葉っぱのつき方は？</h2>
            <ul>
                <li class="category-item bg-white txt-black">
                    <img src="img/2/1.png" id="leaf-attachment-1">
                    <p class="category-name">対生</p>
                </li>
        
                <li class="category-item bg-white txt-black">
                    <img src="img/2/2.png" id="leaf-attachment-2">
                    <p class="category-name">互生</p>
                </li>
                <li class="category-item bg-white txt-black">
                    <img src="img/2/3.png" id="leaf-attachment-3">
                    <p class="category-name">輪生</p>
                </li>
                <li class="category-item bg-white txt-black">
                    <img src="img/2/4.png" id="leaf-attachment-4">
                    <p class="category-name">コクサギ型の互生</p>
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

        <div class="category-3 bg-white">
            <h2 class="txt-green">3. 単葉？複葉？</h2>
            <ul>
                <li class="category-item bg-grey txt-black">
                    <img src="img/3/1.png" id="leaf-pattern-1">
                    <p class="category-name">単葉</p>
                </li>
        
                <li class="category-item bg-grey txt-black">
                    <img src="img/3/2.png" id="leaf-pattern-2">
                    <p class="category-name">偶数羽状複葉</p>
                </li>
                <li class="category-item bg-grey txt-black">
                    <img src="img/3/3.png" id="leaf-pattern-3">
                    <p class="category-name">奇数羽状複葉</p>
                </li>
                <li class="category-item bg-grey txt-black">
                    <img src="img/3/4.png" id="leaf-pattern-4">
                    <p class="category-name">掌状</p>
                </li>
                <li class="category-item bg-grey txt-black">
                    <img src="img/3/5.png" id="leaf-pattern-5">
                    <p class="category-name">出複葉</p>
                </li>
                <li class="category-item bg-grey txt-black">
                    <img src="img/mark_question.png" class="mark-question">
                    <p class="category-name">よくわからない</p>
                </li>
            </ul>
        </div>

        <div class="category-4 bg-green">
            <h2 class="txt-white">4. 単葉の形は？</h2>
            <ul>
                <li class="category-item bg-white txt-black">
                    <img src="img/4/1.png" id="leaf-shape-1">
                    <p class="category-name">心形</p>
                </li>
                <li class="category-item bg-white txt-black">
                    <img src="img/4/2.png" id="leaf-shape-2">
                    <p class="category-name">三角形</p>
                </li>
                <li class="category-item bg-white txt-black">
                    <img src="img/4/3.png" id="leaf-shape-3">
                    <p class="category-name">ひし形</p>
                </li>
                <li class="category-item bg-white txt-black">
                    <img src="img/4/4.png" id="leaf-shape-4">
                    <p class="category-name">円形</p>
                </li>
                <li class="category-item bg-white txt-black">
                    <img src="img/4/5.png" id="leaf-shape-5">
                    <p class="category-name">楕円形</p>
                </li>
                <li class="category-item bg-white txt-black">
                    <img src="img/4/6.png" id="leaf-shape-6">
                    <p class="category-name">長楕円形</p>
                </li>
                <li class="category-item bg-white txt-black">
                    <img src="img/4/7.png" id="leaf-shape-7">
                    <p class="category-name">卵形</p>
                </li>
                <li class="category-item bg-white txt-black">
                    <img src="img/4/8.png" id="leaf-shape-8">
                    <p class="category-name">倒卵形</p>
                </li>
                <li class="category-item bg-white txt-black">
                    <img src="img/4/9.png" id="leaf-shape-9">
                    <p class="category-name">抜針形</p>
                </li>
                <li class="category-item bg-white txt-black">
                    <img src="img/4/10.png" id="leaf-shape-10">
                    <p class="category-name">倒抜針形</p>
                </li>
                <li class="category-item bg-white txt-black">
                    <img src="img/4/11.png" id="leaf-shape-11">
                    <p class="category-name">広線形</p>
                </li>
                <li class="category-item bg-white txt-black">
                    <img src="img/mark_question.png" class="mark-question">
                    <p class="category-name">わからない</p>
                </li>
            </ul>
        </div>

        <div class="category-5 bg-white">
            <h2 class="txt-green">5. 葉の切れ込みは？</h2>
            <ul>
                <li class="category-item bg-grey txt-black">
                    <img src="img/5/1.png" id="leaf-blade-1">
                    <p class="category-name">切れ込みなし</p>
                </li>
        
                <li class="category-item bg-grey txt-black">
                    <img src="img/5/2.png" id="leaf-blade-2">
                    <p class="category-name">３～５裂</p>
                </li>
                <li class="category-item bg-grey txt-black">
                    <img src="img/5/3.png" id="leaf-blade-3">
                    <p class="category-name">５～７裂</p>
                </li>
                <li class="category-item bg-grey txt-black">
                    <img src="img/5/4.png" id="leaf-blade-4">
                    <p class="category-name">７～１１裂</p>
                </li>
                <li class="category-item bg-grey txt-black">
                    <img src="img/5/5.png" id="leaf-blade-5">
                    <p class="category-name">羽状裂</p>
                </li>
                <li class="category-item bg-grey txt-black">
                    <img src="img/mark_question.png" class="mark-question">
                    <p class="category-name">わからない</p>
                </li>
            </ul>
        </div>

        <div class="category-6 bg-green">
            <h2 class="txt-white">6. 葉縁の状態は？</h2>
            <ul>
                <li class="category-item bg-white txt-black">
                    <img src="img/6/1.png" id="leaf-edge-1">
                    <p class="category-name">全縁</p>
                </li>
                <li class="category-item bg-white txt-black">
                    <img src="img/6/2.png" id="leaf-edge-2">
                    <p class="category-name">鋸歯縁</p>
                </li>
                <li class="category-item bg-white txt-black">
                    <img src="img/6/3.png" id="leaf-edge-3">
                    <p class="category-name">鈍鋸歯縁</p>
                </li>
                <li class="category-item bg-white txt-black">
                    <img src="img/6/4.png" id="leaf-edge-4">
                    <p class="category-name">重鋸歯縁</p>
                </li>
                <li class="category-item bg-white txt-black">
                    <img src="img/6/5.png" id="leaf-edge-5">
                    <p class="category-name">波状縁</p>
                </li>
                <li class="category-item bg-white txt-black">
                    <img src="img/6/6.png" id="leaf-edge-6">
                    <p class="category-name">歯牙縁</p>
                </li>
                <li class="category-item bg-white txt-black">
                    <img src="img/6/7.png" id="leaf-edge-7">
                    <p class="category-name">一部鋸歯</p>
                </li>
                <li class="category-item bg-white txt-black">
                    <img src="img/mark_question.png" class="mark-question">
                    <p class="category-name">わからない</p>
                </li>
            </ul>
        </div>

        <div class="category-7 bg-white">
            <h2 class="txt-green">7. 葉脈の走り方は？</h2>
            <ul>
                <li class="category-item bg-grey txt-black">
                    <img src="img/7/1.png" id="leaf-vein-1">
                    <p class="category-name">羽状脈</p>
                </li>
        
                <li class="category-item bg-grey txt-black">
                    <img src="img/7/2.png" id="leaf-vein-2">
                    <p class="category-name">羽状と３行脈の間</p>
                </li>
                <li class="category-item bg-grey txt-black">
                    <img src="img/7/3.png" id="leaf-vein-3">
                    <p class="category-name">３行脈</p>
                </li>
                <li class="category-item bg-grey txt-black">
                    <img src="img/7/4.png" id="leaf-vein-4">
                    <p class="category-name">掌状脈</p>
                </li>
                <li class="category-item bg-grey txt-black">
                    <img src="img/mark_question.png" class="mark-question">
                    <p class="category-name">わからない</p>
                </li>
            </ul>
        </div>

        <div class="category-8 bg-green">
            <h2 class="txt-white">8. 側脈の先端の形は？</h2>
            <ul>
                <li class="category-item bg-white txt-black">
                    <img src="img/8/1.png" id="leaf-lateral-vein-1">
                    <p class="category-name">枝別れせず<br>鋸歯に入る</p>
                </li>
        
                <li class="category-item bg-white txt-black">
                    <img src="img/8/2.png" id="leaf-lateral-vein-2">
                    <p class="category-name">枝別れして<br>鋸歯に入る</p>
                </li>
                <li class="category-item bg-white txt-black">
                    <img src="img/8/3.png" id="leaf-lateral-vein-3">
                    <p class="category-name">枝別れせず<br>縁に達しない</p>
                </li>
                <li class="category-item bg-white txt-black">
                    <img src="img/8/4.png" id="leaf-lateral-vein-4">
                    <p class="category-name">枝別れして<br>縁に達しない</p>
                </li>
                <li class="category-item bg-white txt-black">
                    <img src="img/mark_question.png" class="mark-question">
                    <p class="category-name">わからない</p>
                </li>
            </ul>
        </div>

        <div class="search-button bg-white">
                <input type="submit" value ="検索する" class="bg-green txt-white">
        </div>
    </form>

    <footer>
    <div class="container">
        <nav class="footB">
        <ul>
            <li><a href="index.php">ホーム</a></li>
            <li><a href="index.php#first-category">検索する</a></li>
        </ul>
        </nav>
    </footer>

    <script src="main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>