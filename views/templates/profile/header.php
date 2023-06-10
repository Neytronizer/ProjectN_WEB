<section class="profile__window__header">
    <div class="profile__window__header__inner">
        <img src="<?= $userData['pathToAvatarImage'] ?>" class="profile__picture">
        <h1 class="profile__window__header__inner__name"><?= $userData['nickname']?></h1>
        <form action="../../../vendor/saveAvatarImage.php?userID=<?=$userID?>" method="POST" enctype="multipart/form-data">
            <input type="file" name="avatar">
            <input type="submit" value="Загрузить">
        </form>
    </div>
    <a href="/">Main Page</a>
</section>