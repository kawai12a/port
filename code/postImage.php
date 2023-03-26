<?php include('db_con.php');
include('header.php'); ?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>post</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            border: 0;
            background-color: #f8f8f8;
        }
    </style>
</head>

<body>
    <main>
        <form action="post_img.php" method="post" enctype="multipart/form-data">

            <img id="preview"><br>
            <input type="file" id="fileElem" name="image" multiple style="display:none" onchange="previewFile(this);" require />
            <button id="fileSelect" class="fileSelect" type="button">ファイルを選択</button><br>
            <div class="postImageName">
            <input type="text" id="Title" name="imageName" class="postImageName" placeholder="タイトル">
            <div class="TitleCount">0/32</div>
            </div>
            <div class="postImageCaption">
            <textarea name="imageCaption" id="textArea" class="postImageCaption"  placeholder="キャプション"></textarea>
            <div class="CaptionCount">0/500</div>
            </div>
            <button type="submit" class="postImageButton">投稿</button>
        </form>
    </main>


    <script>
        let fileSelect = document.getElementById("fileSelect");
        let fileElem = document.getElementById("fileElem");
        fileSelect.addEventListener("click", (e) => {
            if (fileElem) {
                fileElem.click();
            }
        }, false);
        function previewFile(event) {
            let fileData = new FileReader();
            fileData.onload = (function() {
                document.getElementById('preview').src = fileData.result;
            });
            fileData.readAsDataURL(event.files[0]);
        }

        let Title = document.querySelector('#Title');
        let length = document.querySelector('.TitleCount');
        let maxLength = 32;
        Title.addEventListener('input', () => {
            length.textContent = Title.value.length + "/32";
        }, false);
        Title.addEventListener('change', () => {
            if (Title.value.length > maxLength) {
                Title.value = Title.value.substr(0, maxLength)
                length.textContent = Title.value.length + "/32";
            }
        }, false);

        let textArea = document.querySelector('#textArea');
        let len = document.querySelector('.CaptionCount');
        let MAXlength = 500;
        textArea.addEventListener('input', () => {
            len.textContent = textArea.value.length + "/500";
        }, false);
        textArea.addEventListener('change', () => {
            if (textArea.value.length > MAXlength) {
                textArea.value = textArea.value.substr(0, MAXlength)
                len.textContent = textArea.value.length + "/500";
            }
        }, false);
    </script>
</body>

</html>