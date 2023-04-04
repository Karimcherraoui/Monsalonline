<?php
// require APPROOT . '/views/inc/header.php';
?>


<section class="bg-blue-300 min-h-screen flex items-center justify-center">

    <!-- login container -->

    <div class="bg-gray-100 flex  rounded-2xl shadow-lg max-3xl p-3 ">

        <!-- form -->

        <div class="sm:w-1/2 px-5 ">
            <h2 class="font-bold text-2xl">Register</h2>

            <form action="<?= URLROOT . '/Users/register' ?>" class="flex flex-col gap-4" method="POST">
                <input class="p-2 mt-8 rounded-xl border " required type="text" name="nom" placeholder="Nom complet">
                <input class="p-2 mt-2 rounded-xl border" required type="number" name="phone" placeholder="Numero de telephone">
                <input class="p-2 mt-2 rounded-xl border" required type="text" name="prenom" placeholder="Adress">
                

                <div>
                    <input class="p-2 mt-2 rounded-xl border <?php echo (empty($data['email_err'])) ? 'is-invalid ' : ''; ?>" value="<?php echo ($data['email']); ?>" type="email" name="email" placeholder="Email">
                    <span class="invalid-feedback text-red-600 "><?php echo '<br>'; ?><?php echo $data['email_err']; ?></span>
                </div>
                

                <button class="bg-green-300 border py-2 w-2/4 rounded-xl mt-1 text-black hover:scale-110">
                    Register Now
                </button>

            </form>
        </div>


        <!-- image -->

        <div class="sm:block hidden w-1/2 p-5">
            <img class="rounded-2xl " src="http://localhost/electromaroc/public/images/signin.webp" alt="login Image">
        </div>

    </div>

</section>










<?php
require APPROOT . '/views/inc/footer.php';
?>