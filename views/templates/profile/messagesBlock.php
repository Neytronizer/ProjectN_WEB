<?php
    $sqlQuery =
    "SELECT * FROM `messages` WHERE `userID` = '$userID'";

    $messages = mysqli_query($connect, $sqlQuery);
    $messages = mysqli_fetch_all($messages);
?>
<section class="profile__window__block profile__window__messages">
    <h1 class="profile__window__block__title">Messages</h1>
    <nav class="admin__devlogs">
        <h3 class="admin__devlogs__options" id="writeMessage">Write a message</h3>
        <h3 class="admin__devlogs__options" id="checkMessages">Check Messages</h3>
    </nav>
    <div class="profile__window__messages__block" id="checkMessagesBlock">
        <?php if(count($messages) > 0) :?>
            <?php foreach($messages as $message) : ?>
                <?php
                    $sqlQuery = "SELECT `nickname`, `pathToAvatarImage` FROM `users` WHERE `id` = '$message[3]'";
                    $result = mysqli_query($connect, $sqlQuery);
                    $result = mysqli_fetch_assoc($result);
                ?>
                <h1><?= $result['nickname']?></h1>
                <p class="message__text"><?= $message[1]?></p>
            <?php endforeach; ?>
        <?php else :?>
            <h1>There is no messages!</h1>
        <?php endif;?>
    </div>
    <form class="proifle__window__messages__block" id="writeMessageBlock" action="../../vendor/sendMessage.php" method="POST">
        <?php 
            $sqlQuery = "SELECT `id`, `nickname` FROM `users` WHERE `id` != '$userID'";
            $results = mysqli_query($connect, $sqlQuery);
            $results = mysqli_fetch_all($results);
        ?>
        <select class="admin__devlog__create__input" name="userID">
            <?php foreach($results as $result) :?>
                <option value="<?= $result[0]?>">
                    <?= $result[1]?>
                </option>
            <?php endforeach;?>
        </select>
        <label for="text">Text</label>
        <textarea class="admin__devlog__create__input" name="text" id="text" cols="30" rows="10"></textarea>
        <input type="hidden" value="<?=$userID?>" name="senderID">
        <input class="admin__devlog__create__input" type="submit" value="Send">
    </form>
</section>