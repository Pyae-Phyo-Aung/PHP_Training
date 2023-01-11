<?php

session_start();
if (!$_SESSION['username']) {
    header("location:login.php");
}

require_once 'libary/document/vendor/autoload.php';

$templatesDocsFolder = "files/";
$templatesDocName = "quotes.docx";
$templatesDocPath = $templatesDocsFolder . $templatesDocName;
$phpWord = \PhpOffice\PhpWord\IOFactory::createReader('Word2007')->load($templatesDocPath);
$content = '';

include_once "header.php";
?>
<!--/.header -->
<section class="sec-document-list">
    <div class="l-inner">
        <h1>Document file data</h1>
        <p class="text-blk">
            <?php
            foreach ($phpWord->getSections() as $section) {
                foreach ($section->getElements() as $element) {
                    if ($element instanceof PhpOffice\PhpWord\Element\TextRun) {
                        if (count($element->getElements()) > 0 and $element->getElements()[0] instanceof PhpOffice\PhpWord\Element\Text) {
                            echo $element->getElements()[0]->getText();
                        }
                    }
                }
            }
            ?>
        </p>
    </div>
</section>
<!--/.sec-document-list -->
</body>

</html>
