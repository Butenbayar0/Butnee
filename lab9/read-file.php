<?php
// Файлыг авах
if (isset($_FILES['file'])) {
    $file = $_FILES['file'];
    // Текст файл байна уу үгүй юу гэдгийг шалгая (text/plain)
    if ($file['type'] === 'text/plain') {
        // Файл байгаа эсэхийг шалгана. file_exists
        if (file_exists($file['tmp_name'])) {
            // Файлыг унших боломжтой эсэхийг шалгая. is_readable()
            if (is_readable($file['tmp_name'])) {
                // Файлыг унших
                $content = file_get_contents($file['tmp_name']);
                if ($content !== false) {
                    echo $content;
                } else {
                    echo "Файлыг унших боломжгүй форматтай байна";
                }
            } else {
                echo "Файл байхгүй байна";
            }
        } else {
            echo "Файл байхгүй байна";
        }
    } else {
        echo "Текст файл биш байна.";
    }
} else {
    echo "Файл сонгоогүй байна";
}
?>
