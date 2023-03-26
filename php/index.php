<?php 
$date = date("m/d/Y");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/chart.js"></script>
    <script src="script.js"></script>
    
    <!-- Taiwind CSS Link -->
    <link rel="stylesheet" href="../css/output.css"> 
    <title>Aquaponic</title>
</head>
<body>
<header class="border-b-4 mx-[13px] py-[5px]">
    <h2 class="font-bold text-xl">A<span class="text-[#007405]">q</span><span class="text-[#960000]">u</span><span class="text-[#001AFF]">a</span>ponic</h2>
</header>
<section class="mb-[25px]">
    <div class="container mx-auto">
        <header class="my-[25px]">
            <h1 class="font-bold text-2xl">Daily Reports</h1>
            <h4 class="text-[#626262] font-semibold text-base">Here are the sensor reports this day <span class="font-inter"><?php echo $date ?></span></h4>
        </header>
        <div class="flex space-x-[30px]">
            <div class="c-shadow" style="min-width: 15rem"> 
                <div class="rounded-t-xl bg-[#01BEBE] p-[25px]">
                    <svg width="56" height="67" viewBox="0 0 56 67" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g filter="url(#filter0_d_3_22)">
                        <path d="M40.8997 15.731L11.0079 45.6228C9.61213 47.0185 7.22777 46.6986 6.38452 44.9249C4.87248 41.8136 4.00016 38.2952 4.00016 34.6023C3.942 18.5515 20.2255 4.82688 25.7502 0.61063C26.8261 -0.203543 28.28 -0.203543 29.3268 0.61063C31.8565 2.52975 36.5962 6.51338 41.045 11.7473C42.0337 12.9105 41.9755 14.6551 40.8997 15.731Z" fill="white"/>
                        <path d="M51.1102 34.6323C51.1102 47.6009 40.5551 58.1561 27.5574 58.1561C22.3525 58.1561 17.4964 56.4696 13.5709 53.5618C12.1461 52.515 12.0298 50.4214 13.2802 49.1711L42.5614 19.8898C43.9281 18.5232 46.2252 18.814 47.1557 20.5005C49.54 24.8913 51.1393 29.66 51.1102 34.6323Z" fill="white"/>
                        </g>
                        <defs>
                        <filter id="filter0_d_3_22" x="0" y="0" width="55.1106" height="66.1561" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                        <feOffset dy="4"/>
                        <feGaussianBlur stdDeviation="2"/>
                        <feComposite in2="hardAlpha" operator="out"/>
                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.5 0"/>
                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_3_22"/>
                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_3_22" result="shape"/>
                        </filter>
                        </defs>
                    </svg>
                    <div class="flex justify-between space-x-[20px]">
                        <div>
                            <h5 class="font-inter font-bold text-white text-[12px]">pH Level</h5>
                            <h2 id="pHheader" class="font-inter font-semibold text-white text-3xl">0.00</h2>
                        </div>
                        <div>
                            <canvas id="phDoughnut" width="80"></canvas>
                        </div>
                    </div>
                </div>
                <div class="bg-[#009090] pt-[10px] px-[25px] pb-[25px] rounded-b-xl ">
                    <h3 id="pHValue" class="font-bold text-base text-white">pH Status</h3>
                    <h3 id="pHStatus" class="font-inter font-medium text-black text-base">Description</h3>
                </div>
            </div>
            <div class="c-shadow"> 
                <div class="rounded-t-xl bg-[#115977] p-[25px]">
                    <svg width="38" height="69" viewBox="0 0 38 69" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g filter="url(#filter0_d_3_57)">
                        <path d="M10.516 33.3672V9.14166C10.516 4.12416 14.3239 0.0566711 19.0213 0.0566711C23.7186 0.0566711 27.5266 4.12416 27.5266 9.14166V33.3672C30.9697 36.1296 33.1968 40.5278 33.1968 45.4816C33.1968 53.8441 26.8502 60.6232 19.0213 60.6232C11.1923 60.6232 4.84573 53.8441 4.84573 45.4816C4.84573 40.5278 7.07286 36.1296 10.516 33.3672Z" fill="white"/>
                        </g>
                        <path d="M19.2063 19.2226V38.9068" stroke="#363642" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M19.2062 51.0201C22.3378 51.0201 24.8764 48.3085 24.8764 44.9635C24.8764 41.6185 22.3378 38.9068 19.2062 38.9068C16.0747 38.9068 13.536 41.6185 13.536 44.9635C13.536 48.3085 16.0747 51.0201 19.2062 51.0201Z" stroke="#363642" stroke-width="5" stroke-linejoin="round"/>
                        <defs>
                        <filter id="filter0_d_3_57" x="0.845734" y="0.0566711" width="36.3511" height="68.5666" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                        <feOffset dy="4"/>
                        <feGaussianBlur stdDeviation="2"/>
                        <feComposite in2="hardAlpha" operator="out"/>
                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.5 0"/>
                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_3_57"/>
                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_3_57" result="shape"/>
                        </filter>
                        </defs>
                    </svg>

                    <div class="flex justify-between space-x-[20px]">
                        <div>
                            <h5 class="font-inter font-bold text-white text-[12px]">Water Temperature</h5>
                            <h2 id="wTheader" class="font-inter font-semibold text-white text-3xl"></h2>
                        </div>
                        <div>
                            <canvas id="waterTempDoughnut" width="80"></canvas>
                        </div>
                    </div>
                </div>
                <div class="bg-[#006B98] pt-[10px] px-[25px] pb-[25px] rounded-b-xl ">
                    <h3 id="WTValue" class="font-bold text-base text-white">STATUS</h3>
                    <h3 id="pHStatus" class="font-inter font-medium text-black text-base">Water Temperature</h3>
                </div>
            </div>
            <div class="bg-white flex items-stretch grow rounded-lg p-[25px]">
                <div class="border-y-2 p-[10px] grow flex space-x-[5rem]">
                    
                    <div class="w-1/2">
                        <h1 class="font-bold text-2xl mb-[10px]">Lowest Recorded</h1>
                        <div class="mb-[10px]">
                            <h4 class="font-medium font-inter text-base text-[#626262]">pH Level</h4>
                            <div id="lowpH" class="flex justify-between">
                            </div>
                        </div>

                        <div>
                            <h4 class="font-medium font-inter text-base text-[#626262]">Water Temperature</h4>
                            <div id="lowWT" class="flex justify-between">
                            </div>
                        </div>
                    </div>
                    <div class="w-1/2">
                        <h1 class="font-bold text-2xl mb-[10px]">Highest Recorded</h1>
                        <div class="mb-[10px]">
                            <h4 class="font-medium font-inter text-base text-[#626262]">pH Level</h4>
                            <div id="highpH" class="flex justify-between">
                            </div>
                        </div>

                        <div>
                            <h4 class="font-medium font-inter text-base text-[#626262]">Water Temperature</h4>
                            <div id="highWT" class="flex justify-between">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container mx-auto pb-[20px]">
        <header class="pb-[20px]">
            <h1 class="font-bold text-2xl">Tank inamo Analysis</h1>
        </header>
        <div class="flex space-x-[30px]">
            <!-- TABLE -->
            <div id="table" class="flex bg-white rounded-lg flex-col overflow-hidden">
            </div>
            <div class="w-[462px] grow">
                <div class="bg-white rounded-lg p-[20px]">
                    <h3 class="font-bold text-base">Line Graph </h3>
                    <canvas id="lineGraph"></canvas>
                </div>
                <h2 class="font-bold text-base py-3">Recommended Action</h2>
                <div class="relative bg-white rounded-lg c-shadow">
                    <div class="absolute w-[20px] h-[20px] bg-[#4ECB71] rounded-full top-[9px] left-[10px]"></div>
                    <div class="py-[20px] px-[57px]">
                        <h1 class="font-semibold text-2xl">Add Water</h1>
                        <h3 class="font-medium text-xs">To maintain pH level and Water Level</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</section>

</body>
</html>