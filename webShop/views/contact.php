<?php
function autoload($className)
{
    require_once "Models/Contact.php";
}

spl_autoload_register('autoload');

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
require __DIR__ . '/header.php';
?>


<section class="content">
    <form action="contact.php" method="post">
        <div class="elem-group">
            <label for="name">Vorname</label>
            <input type="text" id="name" name="name" placeholder="Max" pattern=[A-Z\sa-z]{3,20} required>
        </div>
        <div class="elem-group">
            <label for="name">Nachname</label>
            <input type="text" id="lastName" name="lastName" placeholder="Mustermann" pattern=[A-Z\sa-z]{3,20} required>
        </div>
        <div class="elem-group">
            <label for="email">Email Adresse</label>
            <input type="email" id="email" name="email" placeholder="max.mustermann@email.com" required>
        </div>
        <div class="elem-group">
            <label for="department-selection">Choose Concerned Department</label>

            <select id="department-selection" name="concerned_department" required>
                <option value="">Select a Department</option>
                <option value="billing">Billing</option>
                <option value="marketing">Marketing</option>
                <option value="technical support">Technical Support</option>
            </select>
        </div>

        <div class="elem-group">
            <label for="name">Plz</label>
            <input id="plz" type="text" id="plz" name="plz" pattern=[A-Z\sa-z]{3,20} required>
        </div>

        <div class="elem-group">
            <label for="title">Stadt</label>
            <input type="text" id="city" name="city" required>
        </div>


        <div class="elem-group">
            <label for="title">Reason For Contacting Us</label>
            <input type="text" id="title" name="email_title" required placeholder="Unable to Reset my Password" pattern=[A-Za-z0-9\s]{8,60}>
        </div>
        <div class="elem-group">
            <label for="message">Write your message</label>
            <textarea id="message" name="visitor_message" placeholder="Say whatever you want." required></textarea>
        </div>
        <button type="submit">Speichern</button>
    </form>
</section>


<?php
require __DIR__ . '/footer.php';
?>