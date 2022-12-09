<!-- view your datails -->
<div class="main-work-pace">
    <div class="conatainer w-50 m-auto border">
        <h1 class="text-center p-4"> YOUR DETAILS</h1>
        <div class="border">
            <div class="conatiner d-flex">
                <h1 class="text-start"><?= $user['name'] ?></h1>
                <span class="positon:absolute;">
                    
                (<?= $user['role_id'] == 1 ? "admin" : " user " ?>)</span>
            </div>
            <br>
            <div class="text-center">
                <p>
                    Larsen & Toubro Ltd, commonly known as L&T, is an Indian multinational conglomerate company, with business interests in engineering, construction, manufacturing, technology, information technology and financial services, headquartered in Mumbai. The company is counted among world's top five construction companies. Wikipedia
                </p>
            </div>
        </div>
    </div>
</div>
