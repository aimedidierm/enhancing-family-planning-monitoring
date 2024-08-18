<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhancing Family Planning Monitoring</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-900">
    <!-- Header Section -->
    <header class="bg-blue-600 text-white py-10">
        <div class="container mx-auto text-center">
            <h1 class="text-4xl font-bold mb-4">Enhancing Family Planning Monitoring</h1>
            <p class="text-xl">A Comprehensive Guide to Contraceptive Methods 🌍💊</p>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-white py-16">
        <div class="container mx-auto flex flex-col lg:flex-row items-center justify-between">
            <div class="lg:w-1/2">
                <h2 class="text-3xl font-bold mb-4">Explore Different Contraceptive Methods</h2>
                <p class="mb-6 text-lg">Discover a wide range of family planning methods that cater to different needs
                    and preferences. Whether you're looking for natural methods, hormonal solutions, or permanent
                    options, we have detailed information to guide you.</p>
                <a href="#methods" class="bg-blue-600 text-white py-3 px-6 rounded-lg font-semibold">Learn More</a>
                <a href="#" class="bg-green-600 text-white py-3 px-6 rounded-lg font-semibold">Member?</a>
            </div>
            <div class="lg:w-1/2 mt-10 lg:mt-0">
                <img src="/photos/intro.PNG" alt="Family Planning" class="rounded-lg shadow-lg">
            </div>
        </div>
    </section>

    <!-- Natural Methods Section -->
    <section id="methods" class="bg-gray-50 py-16">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-center mb-10">Natural Methods 🌱</h2>
            <div class="flex flex-col lg:flex-row justify-between">
                <div class="lg:w-1/3 text-center mb-8 lg:mb-0">
                    <img src="/photos/mama.PNG" alt="Natural Methods" class="mx-auto mb-4">
                    <h3 class="text-xl font-bold mb-2">MAMA</h3>
                    <p>Monitoring fertility through natural signs such as temperature and cervical mucus.</p>
                </div>
                <div class="lg:w-1/3 text-center mb-8 lg:mb-0">
                    <img src="/photos/Fertility-Awareness.PNG" alt="Fertility Awareness" class="mx-auto mb-4">
                    <h3 class="text-xl font-bold mb-2">Fertility Awareness</h3>
                    <p>Understanding your cycle with methods like calendar tracking and sympto-thermal observations.</p>
                </div>
                <div class="lg:w-1/3 text-center">
                    <img src="/photos/fixed.PNG" alt="Fixed-Day Method" class="mx-auto mb-4">
                    <h3 class="text-xl font-bold mb-2">Fixed-Day Method</h3>
                    <p>Track specific days in your cycle to avoid pregnancy naturally.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Hormonal Methods Section -->
    <section class="bg-white py-16">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-center mb-10">Hormonal Methods 💊</h2>
            <div class="flex flex-col lg:flex-row justify-between">
                <div class="lg:w-1/3 text-center mb-8 lg:mb-0">
                    <img src="/photos/pills.PNG" alt="Pills" class="mx-auto mb-4">
                    <h3 class="text-xl font-bold mb-2">Oral Pills</h3>
                    <p>Commonly used hormonal contraceptives taken daily to prevent pregnancy.</p>
                </div>
                <div class="lg:w-1/3 text-center mb-8 lg:mb-0">
                    <img src="/photos/injectables.PNG" alt="Injectables" class="mx-auto mb-4">
                    <h3 class="text-xl font-bold mb-2">Injectables</h3>
                    <p>Receive contraceptive hormones through injections every few months.</p>
                </div>
                <div class="lg:w-1/3 text-center">
                    <img src="/photos/Implants.PNG" alt="Implants" class="mx-auto mb-4">
                    <h3 class="text-xl font-bold mb-2">Implants</h3>
                    <p>Subcutaneous implants like Jadelle or Implanon that release hormones to prevent pregnancy.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Barrier Methods Section -->
    <section class="bg-gray-50 py-16">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-center mb-10">Barrier Methods 🚫</h2>
            <div class="flex flex-col lg:flex-row justify-between">
                <div class="lg:w-1/3 text-center mb-8 lg:mb-0">
                    <img src="/photos/Condoms.PNG" alt="Condoms" class="mx-auto mb-4">
                    <h3 class="text-xl font-bold mb-2">Condoms</h3>
                    <p>Effective mechanical barriers for both men and women to prevent pregnancy and STIs.</p>
                </div>
                <div class="lg:w-1/3 text-center mb-8 lg:mb-0">
                    <img src="/photos/Diaphragm.PNG" alt="Diaphragm" class="mx-auto mb-4">
                    <h3 class="text-xl font-bold mb-2">Diaphragm & Cervical Cap</h3>
                    <p>Reusable devices that cover the cervix to block sperm from entering the uterus.</p>
                </div>
                <div class="lg:w-1/3 text-center">
                    <img src="/photos/Spermicides.PNG" alt="Spermicides" class="mx-auto mb-4">
                    <h3 class="text-xl font-bold mb-2">Spermicides</h3>
                    <p>Chemical agents that kill sperm, used alone or with other barrier methods.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- IUD Section -->
    <section class="bg-white py-16">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-center mb-10">Intrauterine Devices (IUDs) & Sterilization 🩺</h2>
            <div class="flex flex-col lg:flex-row justify-between">
                <div class="lg:w-1/2 text-center mb-8 lg:mb-0">
                    <img src="/photos/IUDs.PNG" alt="IUD" class="mx-auto mb-4">
                    <h3 class="text-xl font-bold mb-2">IUDs</h3>
                    <p>Long-term, reversible contraception inserted into the uterus to prevent pregnancy.</p>
                </div>
                <div class="lg:w-1/2 text-center">
                    <img src="/photos/Sterilization.PNG" alt="Sterilization" class="mx-auto mb-4">
                    <h3 class="text-xl font-bold mb-2">Sterilization</h3>
                    <p>Permanent contraceptive methods, including tubal ligation for women and vasectomy for men.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Efficacy & Safety Section -->
    <section class="bg-gray-50 py-16">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-center mb-10">Efficacy & Safety 📊🔒</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="p-6 bg-white rounded-lg shadow-lg">
                    <h3 class="text-2xl font-bold mb-4">Efficacy</h3>
                    <p>Contraceptives must prevent pregnancy in more than 70% of cases to be considered effective. Each
                        method's effectiveness varies, so it's essential to choose the right one for your needs.</p>
                </div>
                <div class="p-6 bg-white rounded-lg shadow-lg">
                    <h3 class="text-2xl font-bold mb-4">Safety</h3>
                    <p>The safety of contraceptives is paramount, with an emphasis on minimizing side effects that could
                        harm your health. Most methods have been rigorously tested to ensure safety.</p>
                </div>
                <div class="p-6 bg-white rounded-lg shadow-lg">
                    <h3 class="text-2xl font-bold mb-4">Tolerance</h3>
                    <p>Tolerance refers to the presence of non-dangerous side effects that are generally acceptable.
                        It's essential to consider how well you can tolerate a method before choosing it.</p>
                </div>
                <div class="p-6 bg-white rounded-lg shadow-lg">
                    <h3 class="text-2xl font-bold mb-4">Reversibility</h3>
                    <p>Many contraceptive methods are reversible, allowing fertility to return once the method is
                        stopped. However, methods like sterilization are permanent and should be chosen with care.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="bg-blue-600 text-white py-10">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 Enhancing Family Planning Monitoring. All rights reserved.</p>
            {{-- <p>For more information, contact us at <a href="mailto:info@familyplanning.com"
                    class="underline">info@familyplanning.com</a></p> --}}
        </div>
    </footer>
</body>

</html>