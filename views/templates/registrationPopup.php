<div class="popup" id="registrationPopup">
    <div class="popup__window">
        <div class="popup__window__close">&times;</div>
        <div class="popup__window__content">
            <form action="../../vendor/authentication.php" method="POST">
                <input class="popup__window__input" type="email" name="email" placeholder="Email">
                <input class="popup__window__input" type="text" name="login" placeholder="Login">
                <input class="popup__window__input" type="text" name="nickname" placeholder="Nickname">
                <input class="popup__window__input" type="password" name="password" placeholder="Password">
                <input type="hidden" name="isRegistrationRequest" value="true">
                <input class="popup__window__submit submit--green" type="submit" value="Sign up">
            </form>
        </div>
    </div>
</div>