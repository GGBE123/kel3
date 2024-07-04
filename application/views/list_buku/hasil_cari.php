<!DOCTYPE html>
<html>
<head>
    <title>Hasil Pencarian</title>
</head>
<body>
    <h1>Search Results</h1>
    <?php if (!empty($books)): ?>
        <ul>
            <?php foreach ($books as $book): ?>
                <li>
                    <strong>Judul:</strong> <?php echo $book['judul']; ?><br>
                    <strong>Pengarang:</strong> <?php echo $book['pengarang']; ?><br>
                    <strong>Halaman:</strong> <?php echo $book['halaman']; ?><br>
                    <strong>Media:</strong> <?php echo $book['media']; ?><br>
                    <strong>Sinopsis:</strong> <?php echo $book['sinopsis']; ?><br>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No books found.</p>
    <?php endif; ?>
</body>
</html>