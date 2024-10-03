 <!DOCTYPE html>

 <head>
     <meta charset="utf-8">
     <title>Login | - Admin &amp; Dashboard </title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- App favicon -->
     <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
     <meta name="csrf-token" content="{{ csrf_token() }}">
     <!-- jvectormap -->
     <link href="{{ asset('assets/libs/jqvmap/jqvmap.min.css') }}" rel="stylesheet">
     <!-- Dynamically include styles based on language -->
     <!-- Bootstrap LTR CSS -->
     <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css">
     <!-- App LTR CSS -->
     <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css">
     <!-- Icons CSS (same for both languages) -->
     <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

     <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

     <!-- Additional Inline Styles (can remain the same for both languages) -->
     <style id="apexcharts-css">

        
         @keyframes opaque {
             0% {
                 opacity: 0;
             }

             to {
                 opacity: 1;
             }
         }
     </style>
 </head>

 <body>
     <div class="bg-overlay"></div>
     <div class="account-pages my-5 pt-5">
         <div class="container">
             <div class="row justify-content-center">
                 <div class="col-xl-4 col-lg-6 col-md-8">
                     <div class="card">
                         <div class="card-body p-4">
                             <div class="text-center">
                                 <a href="#">
                                    <svg width="200" height="100" viewBox="0 0 173 79" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="h-14 w-auto" main_color="#21499f" alt="zaman">
                                    <path
                                        d="M158.453 35.5435C157.978 35.5048 157.502 35.4758 157.028 35.4232C156.639 35.3791 156.251 35.3125 155.864 35.2437C155.635 35.2028 155.411 35.1373 155.156 35.076C155.259 34.272 155.361 33.4799 155.466 32.6651C156.64 33.0811 157.81 33.238 159.01 33.1929C161.074 33.1144 162.307 32.1062 162.72 30.0748C162.868 29.345 162.947 28.5883 162.95 27.8445C162.969 22.7875 162.96 17.7293 162.96 12.6722V12.2971H165.861C165.866 12.4035 165.874 12.4949 165.874 12.5852C165.874 17.6713 165.88 22.7563 165.868 27.8424C165.866 29.0376 165.698 30.2156 165.293 31.3474C164.495 33.5755 162.896 34.8696 160.596 35.3082C160.019 35.4178 159.425 35.4382 158.839 35.5005C158.729 35.5124 158.619 35.5296 158.51 35.5446H158.454L158.453 35.5435Z"
                                        fill="#264642"></path>
                                    <path
                                        d="M166.105 7.39057C165.966 7.82265 165.778 8.21927 165.389 8.49442C164.77 8.93295 163.92 8.9351 163.313 8.48475C162.704 8.03332 162.473 7.23902 162.737 6.49631C162.995 5.76973 163.683 5.33012 164.496 5.36882C165.201 5.40321 165.856 5.95782 166.042 6.67688C166.056 6.72847 166.083 6.77684 166.103 6.82736V7.39057H166.105Z"
                                        fill="#264642"></path>
                                    <path
                                        d="M86.0948 12.2897H89.0025V24.9662H89.4149C106.529 24.9662 123.644 24.9651 140.758 24.9705C141.486 24.9705 142.214 25.0296 142.929 25.0608C142.937 25.0812 142.934 25.049 142.917 25.0361C141.757 24.2278 141.138 23.0788 140.883 21.7234C140.525 19.8317 140.587 17.9605 141.417 16.1924C142.518 13.8471 144.388 12.4821 146.941 12.0715C148.437 11.8307 149.929 11.8576 151.393 12.2918C153.535 12.926 154.77 14.4114 155.225 16.5471C155.406 17.393 155.491 18.2732 155.501 19.1385C155.536 21.775 155.514 24.4116 155.513 27.0492C155.513 27.1148 155.508 27.1793 155.502 27.2857H88.9552C88.8177 27.9779 88.7189 28.6335 88.5546 29.2741C87.7909 32.2482 85.663 34.1119 82.6211 34.5343C81.0271 34.7558 79.4417 34.7826 77.8843 34.3441C75.2827 33.6121 73.7446 31.8387 73.0432 29.2774C72.6984 28.0187 72.6221 26.7311 72.634 25.4327C72.6501 23.6055 72.895 21.8105 73.3257 20.037C73.3837 19.8006 73.4761 19.6834 73.736 19.6404C74.5566 19.505 75.3719 19.333 76.1893 19.1782C76.2516 19.1664 76.316 19.1707 76.417 19.1654C76.3128 19.5942 76.2129 19.9973 76.1173 20.4014C75.6469 22.3845 75.4621 24.3976 75.5728 26.4301C75.6533 27.9069 75.9605 29.3322 76.8832 30.5446C77.7264 31.6527 78.866 32.2202 80.2441 32.3503C81.0561 32.4266 81.8564 32.3729 82.6372 32.1493C84.2871 31.6753 85.2248 30.5123 85.7017 28.9194C85.9864 27.9682 86.0873 26.9901 86.0895 26.0034C86.0959 21.5644 86.0938 17.1264 86.0938 12.6873C86.0938 12.567 86.0938 12.4466 86.0938 12.2929L86.0948 12.2897ZM152.645 24.9823C152.653 24.8727 152.66 24.8179 152.66 24.7631C152.66 22.924 152.682 21.085 152.644 19.247C152.63 18.5688 152.528 17.882 152.37 17.221C152.087 16.0279 151.453 15.0735 150.276 14.5705C149.579 14.2727 148.846 14.2104 148.101 14.2491C146.126 14.3501 144.782 15.3465 144.046 17.1608C143.598 18.2646 143.586 19.4233 143.701 20.5938C143.915 22.7682 145.204 24.2482 147.326 24.7416C149.077 25.1479 150.855 24.8813 152.646 24.9834L152.645 24.9823Z"
                                        fill="#264642"></path>
                                    <path
                                        d="M78.836 13.6245C78.8413 12.6518 79.6007 11.8951 80.5685 11.8994C81.5384 11.9027 82.3215 12.6959 82.3097 13.66C82.2978 14.5865 81.5084 15.3507 80.5578 15.3561C79.5878 15.3615 78.8317 14.6016 78.836 13.6256V13.6245Z"
                                        fill="#264642"></path>
                                    <mask id="mask0_136_3567" style="mask-type:luminance;" maskUnits="userSpaceOnUse" x="72" y="37"
                                        width="94" height="25">
                                        <path d="M165.876 37.9662H72.8633V61.9521H165.876V37.9662Z" fill="white"></path>
                                    </mask>
                                    <g mask="url(#mask0_136_3567)">
                                        <path
                                            d="M116.19 37.9662C116.394 39.3441 116.599 40.7231 116.802 42.1011C117.038 43.7015 117.272 45.303 117.507 46.9045C117.742 48.506 117.975 50.1064 118.21 51.7079C118.463 53.4287 118.716 55.1506 118.97 56.8714C119.203 58.4535 119.437 60.0357 119.668 61.6189C119.684 61.7285 119.675 61.8414 119.677 61.9532H117.37C117.297 61.4534 117.222 60.9546 117.15 60.4549C116.917 58.834 116.685 57.2121 116.451 55.5902C116.215 53.9597 115.979 52.3291 115.745 50.6986C115.508 49.0498 115.266 47.401 115.039 45.7501C114.851 44.3776 114.682 43.0018 114.504 41.6281C114.449 41.1971 114.396 40.7661 114.342 40.3351C114.256 40.3878 114.226 40.4415 114.21 40.4996C114.106 40.8682 114.02 41.2433 113.9 41.6066C113.033 44.2357 112.169 46.8658 111.287 49.4894C109.89 53.6458 108.478 57.7979 107.072 61.9521H104.37C101.974 54.755 99.3625 47.63 97.1273 40.3276C97.1155 40.4233 97.108 40.4738 97.1037 40.5254C97.0048 41.5604 96.9168 42.5966 96.8061 43.6305C96.6515 45.074 96.485 46.5154 96.3153 47.9567C96.1617 49.268 95.9962 50.5772 95.8373 51.8885C95.6783 53.1987 95.5204 54.51 95.3614 55.8202C95.2014 57.1401 95.0403 58.46 94.8824 59.7799C94.7965 60.5043 94.717 61.2287 94.6353 61.9542H92.3281C92.4312 61.146 92.529 60.3377 92.6396 59.5316C92.8534 57.9731 93.0736 56.4146 93.2916 54.8571C93.5086 53.3083 93.7288 51.7595 93.9447 50.2107C94.1788 48.5318 94.4087 46.8529 94.6428 45.174C94.877 43.4951 95.1155 41.8173 95.3507 40.1384C95.4517 39.4151 95.5494 38.6917 95.6482 37.9683C96.6418 37.9683 97.6364 37.9683 98.63 37.9683C98.6504 38.0586 98.6633 38.1511 98.6923 38.237C99.8953 41.7786 101.105 45.3191 102.302 48.8628C103.287 51.7767 104.264 54.6938 105.232 57.6141C105.447 58.2654 105.611 58.935 105.821 59.6756C105.879 59.5112 105.917 59.4209 105.944 59.3274C106.163 58.5922 106.357 57.8495 106.601 57.124C107.905 53.2417 109.22 49.3626 110.533 45.4825C111.382 42.977 112.238 40.4727 113.09 37.9683C114.121 37.9683 115.153 37.9683 116.184 37.9683L116.19 37.9662Z"
                                            fill="#264642"></path>
                                        <path
                                            d="M147.363 61.9522C147.359 61.8211 147.352 61.6899 147.352 61.5588C147.352 53.8157 147.352 46.0737 147.352 38.3307C147.352 38.2092 147.359 38.0877 147.363 37.9652C148.376 37.9652 149.389 37.9652 150.402 37.9652C150.441 38.048 150.47 38.135 150.518 38.2114C153.056 42.2172 155.603 46.2167 158.131 50.228C160.025 53.231 162.006 56.1814 163.699 59.3092C163.722 59.3533 163.76 59.3909 163.825 59.4758C163.832 59.3672 163.838 59.3156 163.837 59.2651C163.774 56.649 163.68 54.0318 163.653 51.4156C163.609 47.025 163.609 42.6343 163.592 38.2425C163.592 38.1501 163.614 38.0587 163.626 37.9663C164.357 37.9663 165.089 37.9663 165.82 37.9663C165.826 38.0877 165.838 38.2092 165.838 38.3307C165.838 46.0737 165.838 53.8168 165.838 61.5599C165.838 61.691 165.826 61.8211 165.82 61.9522H162.781C162.75 61.8963 162.721 61.8383 162.687 61.7834C159.803 57.2229 156.916 52.6657 154.035 48.103C152.445 45.5858 150.806 43.0964 149.436 40.4459C149.419 40.4126 149.384 40.389 149.311 40.3105C149.334 40.7705 149.367 41.1628 149.374 41.5562C149.435 44.7538 149.516 47.9504 149.543 51.148C149.573 54.7487 149.555 58.3504 149.557 61.9511H147.362L147.363 61.9522Z"
                                            fill="#264642"></path>
                                        <path
                                            d="M134.252 37.9662C134.914 39.744 135.573 41.5228 136.239 43.2995C138.531 49.4196 140.825 55.5375 143.117 61.6576C143.153 61.7533 143.172 61.8543 143.199 61.9521H140.61C139.923 60.0131 139.23 58.0763 138.553 56.133C138.468 55.889 138.366 55.8051 138.102 55.8062C134.642 55.817 131.183 55.817 127.723 55.8062C127.46 55.8062 127.352 55.8879 127.265 56.1287C126.564 58.073 125.847 60.012 125.135 61.9521H122.828C122.911 61.6952 122.983 61.4351 123.077 61.1825C125.951 53.5405 128.826 45.8995 131.7 38.2585C131.736 38.165 131.751 38.064 131.774 37.9662C132.599 37.9662 133.425 37.9662 134.25 37.9662H134.252ZM137.751 53.9672C136.124 49.4615 134.506 44.9805 132.906 40.5501C131.299 44.9773 129.672 49.4593 128.038 53.9672H137.751Z"
                                            fill="#264642"></path>
                                        <path
                                            d="M72.8633 60.3194C73.1275 59.9239 73.3971 59.5305 73.656 59.1307C77.2382 53.5942 80.8171 48.0545 84.4036 42.5213C84.9074 41.7431 85.4477 40.9875 85.9708 40.2223C86.0277 40.1395 86.0803 40.0535 86.1459 39.9525H73.2575V37.9662H88.6185C88.6228 38.4724 88.6367 38.9787 88.6228 39.4849C88.6196 39.6128 88.5422 39.7504 88.4692 39.8633C85.3016 44.7527 82.1319 49.6421 78.9578 54.5272C77.8193 56.2781 76.6667 58.0204 75.5207 59.767C75.496 59.8046 75.4755 59.8454 75.4412 59.9056H88.7882V61.9521H72.8644C72.8644 61.4061 72.8644 60.8622 72.8644 60.3194H72.8633Z"
                                            fill="#264642"></path>
                                    </g>
                                    <path
                                        d="M90.0719 68.5032V74.0611H89.6434C89.6315 74.0321 89.6133 74.0063 89.6133 73.9816C89.6133 72.1555 89.6154 70.3293 89.6176 68.5032H90.0719Z"
                                        fill="#264642"></path>
                                    <path d="M140.525 68.5032V74.0708H140.07V68.5032H140.525Z" fill="#264642"></path>
                                    <path
                                        d="M74.1262 71.7266C74.718 72.4586 75.3507 73.24 76.008 74.0525C75.6417 74.1235 75.3893 74.1063 75.1648 73.7935C74.6922 73.1325 74.1734 72.5048 73.6718 71.8642C73.6106 71.7868 73.5408 71.7159 73.4742 71.6428C73.4484 71.6503 73.4237 71.6578 73.3979 71.6653V74.0676H72.9414V68.9471C73.6074 68.9041 74.2765 68.8342 74.9318 69.0352C75.3378 69.1588 75.6149 69.4254 75.6955 69.865C75.7921 70.3981 75.7008 70.8958 75.2475 71.2118C74.9189 71.4407 74.5118 71.5557 74.1262 71.7266ZM73.4065 71.2601C73.9156 71.3407 74.3904 71.2859 74.7062 71.1183C75.0735 70.9248 75.2776 70.555 75.2347 70.1617C75.1885 69.7371 74.9532 69.4404 74.5171 69.3598C74.1616 69.2943 73.7932 69.2986 73.4065 69.2695V71.259V71.2601Z"
                                        fill="#264642"></path>
                                    <path
                                        d="M98.6293 73.7064V74.0697H96.1266C96.1212 73.9687 96.1137 73.8773 96.1137 73.786C96.1137 72.2705 96.1169 70.755 96.1094 69.2394C96.1094 69.0288 96.148 68.9353 96.3865 68.9406C97.1233 68.9557 97.8613 68.946 98.6293 68.946C98.6346 69.0632 98.64 69.161 98.6464 69.2996H96.6121V71.2311H98.5154V71.6159H96.6099V73.7064H98.6282H98.6293Z"
                                        fill="#264642"></path>
                                    <path
                                        d="M123.179 72.0803H120.677C120.38 73.412 121.32 74.0085 122.99 73.5807C123.147 73.9107 123.142 73.9709 122.807 74.0204C122.352 74.087 121.886 74.144 121.431 74.1096C120.896 74.0698 120.494 73.7581 120.309 73.2357C120.065 72.5425 120.047 71.8417 120.354 71.1613C120.722 70.3487 121.642 70.0134 122.457 70.3767C123.041 70.6357 123.364 71.3816 123.178 72.0803H123.179ZM120.691 71.7202H122.721C122.764 71.0785 122.385 70.6293 121.805 70.6045C121.191 70.5787 120.708 71.0517 120.691 71.7202Z"
                                        fill="#264642"></path>
                                    <path
                                        d="M81.3041 72.0791H78.8068C78.5608 72.9154 79.0893 73.715 79.9281 73.7451C80.317 73.7591 80.709 73.6731 81.143 73.6269C81.1569 73.6796 81.1859 73.7924 81.2235 73.9343C80.4888 74.1718 79.7756 74.2772 79.0581 73.9579C78.7498 73.8204 78.5468 73.5667 78.434 73.2539C78.1945 72.5908 78.1741 71.919 78.4298 71.2569C78.7445 70.4443 79.5254 70.0692 80.3696 70.3046C81.0861 70.5034 81.4502 71.1752 81.3052 72.0791H81.3041ZM78.796 71.7449C79.4416 71.7449 80.0635 71.7492 80.6865 71.7373C80.7434 71.7373 80.8454 71.6374 80.8487 71.5804C80.8701 71.1559 80.5748 70.7646 80.1645 70.6475C79.4684 70.4476 78.8519 70.9258 78.796 71.7449Z"
                                        fill="#264642"></path>
                                    <path
                                        d="M128.758 73.5581C129.297 73.7376 129.797 73.8139 130.31 73.687C130.775 73.572 131.06 73.27 131.099 72.867C131.145 72.3951 130.984 72.1124 130.506 71.8803C130.176 71.719 129.829 71.5901 129.498 71.4299C128.836 71.1096 128.582 70.6829 128.663 70.0681C128.738 69.4995 129.161 69.0363 129.816 68.9417C130.283 68.874 130.767 68.9288 131.275 68.9288C131.246 69.118 131.228 69.2362 131.221 69.291C130.792 69.291 130.39 69.2695 129.992 69.2964C129.526 69.3286 129.226 69.5941 129.157 69.9735C129.072 70.4475 129.23 70.7689 129.683 70.9914C129.988 71.1419 130.304 71.2655 130.616 71.403C131.4 71.7524 131.668 72.1447 131.599 72.8412C131.536 73.4635 131.027 73.9762 130.285 74.1052C129.761 74.1965 129.234 74.1686 128.693 74.0116C128.715 73.8622 128.735 73.7268 128.76 73.5591L128.758 73.5581Z"
                                        fill="#264642"></path>
                                    <path
                                        d="M86.537 74.0761H86.117V73.3259C86.0289 73.4409 85.987 73.4936 85.9484 73.5484C85.6036 74.0278 85.0171 74.2599 84.4468 74.117C84.0794 74.0256 83.8367 73.7934 83.7593 73.4065C83.6723 72.969 83.8141 72.6208 84.1664 72.3628C84.5767 72.0619 85.059 71.9598 85.5531 71.9243C86.1363 71.8835 86.1374 71.8921 86.0472 71.3084C85.9763 70.842 85.7099 70.613 85.2029 70.6109C85.0064 70.6109 84.8066 70.6399 84.6143 70.6829C84.4242 70.7259 84.2416 70.8033 84.0375 70.8721C84.001 70.7581 83.9677 70.6528 83.9247 70.5163C84.5928 70.2497 85.2566 70.1197 85.9376 70.3852C86.3576 70.5485 86.5187 70.9344 86.5295 71.3461C86.5542 72.2435 86.537 73.1421 86.537 74.0751V74.0761ZM86.059 72.2521C85.5295 72.2414 85.0246 72.2683 84.5638 72.5208C84.2341 72.7025 84.1213 73.0357 84.248 73.3657C84.3662 73.6731 84.6788 73.8332 85.0321 73.7676C85.6605 73.6516 86.1235 72.9884 86.059 72.2511V72.2521Z"
                                        fill="#264642"></path>
                                    <path
                                        d="M160.347 72.135C160.277 72.4446 160.242 72.7692 160.126 73.0615C159.758 73.9945 158.764 74.4029 157.832 74.0343C157.5 73.9031 157.25 73.6785 157.108 73.3539C156.807 72.6638 156.78 71.9566 157.072 71.2623C157.402 70.4798 158.169 70.1165 159.062 70.2799C159.782 70.4121 160.259 71.0258 160.293 71.8685C160.296 71.9534 160.293 72.0383 160.293 72.1232C160.311 72.1275 160.329 72.1307 160.347 72.135ZM159.848 72.2081C159.821 71.9803 159.813 71.7997 159.777 71.6234C159.652 71.0032 159.238 70.6335 158.656 70.6077C158.106 70.5841 157.632 70.9301 157.452 71.5009C157.308 71.9545 157.313 72.4134 157.445 72.8691C157.615 73.456 158.025 73.7817 158.592 73.786C159.121 73.7903 159.562 73.4495 159.726 72.8853C159.793 72.6509 159.814 72.4037 159.848 72.2081Z"
                                        fill="#264642"></path>
                                    <path
                                        d="M134.008 72.2468C134.06 71.9706 134.08 71.6825 134.171 71.4203C134.595 70.1939 135.775 70.0692 136.569 70.3981C137.074 70.6066 137.318 71.0376 137.407 71.5632C137.517 72.2049 137.489 72.8262 137.118 73.3904C136.697 74.0332 135.951 74.3019 135.179 74.0955C134.518 73.9193 134.109 73.3743 134.057 72.5951C134.05 72.4822 134.057 72.3683 134.057 72.2543L134.009 72.2468H134.008ZM134.476 72.149C134.522 72.4145 134.545 72.6413 134.604 72.8584C134.767 73.4517 135.173 73.7752 135.74 73.786C136.277 73.7957 136.723 73.4474 136.891 72.8681C137.019 72.4242 137.027 71.9727 136.905 71.5245C136.748 70.9484 136.375 70.6367 135.824 70.6077C135.309 70.5808 134.855 70.8689 134.66 71.387C134.565 71.6395 134.531 71.9147 134.476 72.1479V72.149Z"
                                        fill="#264642"></path>
                                    <path
                                        d="M110.757 70.8484C110.728 70.7581 110.695 70.6517 110.652 70.5163C111.3 70.2529 111.956 70.1326 112.63 70.3712C113.03 70.5131 113.227 70.8581 113.239 71.2547C113.265 72.1812 113.248 73.1088 113.248 74.0707C113.129 74.0761 112.993 74.0826 112.833 74.0901V73.3173C112.768 73.4119 112.721 73.4796 112.675 73.5462C112.337 74.031 111.713 74.2674 111.148 74.1127C110.802 74.0181 110.56 73.7902 110.489 73.4377C110.407 73.0314 110.498 72.6638 110.847 72.3972C111.278 72.0673 111.784 71.9652 112.308 71.9232C112.457 71.9114 112.608 71.9211 112.746 71.9211C112.996 71.0945 112.516 70.5077 111.702 70.6205C111.389 70.6646 111.084 70.7678 110.758 70.8484H110.757ZM112.789 72.2543C112.243 72.2414 111.703 72.2607 111.222 72.5638C110.933 72.7455 110.85 73.0787 110.981 73.3861C111.099 73.6645 111.406 73.8246 111.726 73.7762C112.368 73.6784 112.838 73.0249 112.79 72.2543H112.789Z"
                                        fill="#264642"></path>
                                    <path
                                        d="M165.362 74.0708C165.362 73.3485 165.362 72.6584 165.362 71.9684C165.362 71.7975 165.372 71.6266 165.356 71.4578C165.327 71.1375 165.249 70.8301 164.922 70.6829C164.591 70.5346 164.268 70.5969 163.982 70.8C163.577 71.0881 163.389 71.5116 163.364 71.992C163.335 72.5681 163.346 73.1464 163.34 73.7236C163.339 73.8343 163.34 73.945 163.34 74.0718H162.891V70.3368H163.348C163.335 70.584 163.322 70.8205 163.305 71.1375C163.399 70.9881 163.445 70.9108 163.494 70.8344C163.865 70.2712 164.755 70.0606 165.343 70.3948C165.602 70.5421 165.774 70.7796 165.78 71.0558C165.804 72.0554 165.79 73.055 165.79 74.0718H165.363L165.362 74.0708Z"
                                        fill="#264642"></path>
                                    <path
                                        d="M143.503 70.3326C143.571 70.325 143.624 70.3132 143.679 70.3132C143.753 70.3132 143.827 70.3218 143.941 70.3304C143.941 70.4594 143.941 70.5787 143.941 70.698C143.948 71.4644 143.944 72.2318 143.964 72.9982C143.971 73.3099 144.058 73.6097 144.397 73.7312C144.777 73.8677 145.129 73.7871 145.428 73.5227C145.833 73.1658 145.962 72.6843 145.976 72.1684C145.988 71.6664 145.979 71.1645 145.98 70.6626C145.98 70.5604 145.98 70.4573 145.98 70.3326H146.407V74.0612H145.991V73.3131C145.915 73.4206 145.881 73.4689 145.849 73.5184C145.472 74.102 144.675 74.3342 144.043 74.0461C143.695 73.887 143.519 73.5861 143.509 73.2335C143.486 72.2705 143.501 71.3074 143.501 70.3315L143.503 70.3326Z"
                                        fill="#264642"></path>
                                    <path
                                        d="M106.999 68.9159V70.3067H108.156C108.162 70.4346 108.166 70.5249 108.173 70.6528H106.994C106.994 70.8721 106.994 71.058 106.994 71.244C106.994 71.8029 106.99 72.3618 106.996 72.9207C107.002 73.6408 107.23 73.8322 107.945 73.7247C107.991 73.7182 108.038 73.7042 108.116 73.6871C108.143 73.8053 108.17 73.9192 108.203 74.0686C107.764 74.1482 107.344 74.2169 106.938 74.0407C106.613 73.8999 106.557 73.5849 106.553 73.2754C106.541 72.508 106.536 71.7405 106.551 70.9742C106.556 70.7194 106.48 70.6335 106.231 70.6603C106.055 70.6797 105.875 70.6636 105.677 70.6636C105.67 70.5485 105.665 70.4583 105.656 70.311C105.88 70.311 106.083 70.3024 106.285 70.3132C106.477 70.3239 106.562 70.2627 106.549 70.0574C106.534 69.8306 106.546 69.6027 106.546 69.3759C106.546 69.1101 106.697 68.9567 106.999 68.9159Z"
                                        fill="#264642"></path>
                                    <path
                                        d="M117.943 73.6946C117.957 73.8268 117.969 73.9353 117.984 74.0751C117.579 74.1481 117.189 74.1944 116.801 74.0675C116.525 73.9772 116.395 73.7483 116.386 73.4785C116.358 72.7036 116.352 71.9265 116.338 71.1515C116.336 71.0021 116.338 70.8527 116.338 70.6689H115.488C115.482 70.5442 115.478 70.4529 115.473 70.3217H116.338C116.338 69.9853 116.338 69.6865 116.338 69.3877C116.338 69.1226 116.491 68.965 116.795 68.9148C116.795 69.2856 116.808 69.6511 116.791 70.0143C116.779 70.2562 116.868 70.3293 117.099 70.3142C117.372 70.297 117.646 70.3099 117.951 70.3099C117.956 70.426 117.961 70.5238 117.968 70.6517H116.848C116.826 70.7194 116.799 70.7613 116.799 70.8043C116.8 71.5524 116.786 72.3016 116.814 73.0486C116.837 73.6483 117 73.7709 117.596 73.7365C117.699 73.7311 117.801 73.7118 117.941 73.6935L117.943 73.6946Z"
                                        fill="#264642"></path>
                                    <path
                                        d="M151.125 73.687C151.153 73.8182 151.175 73.9181 151.206 74.0643C150.745 74.1471 150.294 74.2384 149.866 73.9944C149.623 73.8558 149.568 73.5881 149.565 73.3259C149.555 72.5402 149.545 71.7556 149.559 70.9699C149.563 70.713 149.48 70.6334 149.235 70.6592C149.059 70.6775 148.879 70.6625 148.683 70.6625C148.675 70.5485 148.67 70.4582 148.66 70.3099C148.898 70.3099 149.119 70.3046 149.34 70.3121C149.498 70.3174 149.56 70.253 149.555 70.0939C149.547 69.8574 149.553 69.621 149.553 69.3845C149.553 69.1179 149.7 68.9614 149.993 68.9148V70.3045H151.151V70.6528H150.03C150.02 70.7613 150.006 70.842 150.006 70.9226C150.005 71.5847 150.003 72.2478 150.007 72.9099C150.012 73.6526 150.238 73.8407 150.966 73.7214C151.012 73.7139 151.058 73.7021 151.125 73.6881V73.687Z"
                                        fill="#264642"></path>
                                    <path
                                        d="M103.447 70.2928C103.427 70.4647 103.416 70.5744 103.404 70.6862C103.131 70.6571 102.872 70.6174 102.613 70.6077C102.465 70.6023 102.31 70.6292 102.168 70.6722C101.908 70.7517 101.76 70.9377 101.745 71.216C101.731 71.4805 101.842 71.6858 102.085 71.7857C102.363 71.9007 102.652 71.991 102.94 72.0824C103.363 72.2178 103.664 72.4596 103.679 72.9379C103.694 73.4012 103.469 73.7365 103.068 73.945C102.507 74.2352 101.917 74.1643 101.303 74.073C101.318 73.9203 101.331 73.7935 101.342 73.686C101.717 73.7075 102.071 73.7462 102.423 73.7387C102.583 73.7355 102.754 73.6624 102.899 73.5817C103.113 73.4635 103.218 73.2647 103.201 73.0132C103.184 72.7692 103.045 72.609 102.826 72.5252C102.589 72.4349 102.344 72.3618 102.102 72.2812C101.48 72.0727 101.244 71.7814 101.272 71.258C101.298 70.7743 101.63 70.3895 102.201 70.3035C102.601 70.2433 103.018 70.2917 103.446 70.2917L103.447 70.2928Z"
                                        fill="#264642"></path>
                                    <path d="M154.21 74.0697H153.789V70.3282H154.21V74.0697Z" fill="#264642"></path>
                                    <path
                                        d="M154.335 69.0255C154.335 69.2631 154.212 69.3867 154.009 69.3899C153.817 69.3931 153.688 69.2652 153.684 69.0718C153.679 68.8686 153.789 68.7343 154.011 68.7343C154.215 68.7343 154.317 68.8471 154.335 69.0255Z"
                                        fill="#264642"></path>
                                    <path
                                        d="M5.73438 65.6377C5.73438 44.6914 5.73438 23.7462 5.73438 2.79993C22.9149 2.79993 40.0955 2.79993 57.2761 2.79993C57.2825 2.90204 57.2943 3.00522 57.2943 3.10733C57.2943 12.7357 57.2943 22.3629 57.2943 31.9912C57.2943 32.1009 57.2847 32.2105 57.2804 32.3105H16.5647V31.9654C16.5647 26.0442 16.5647 20.123 16.5647 14.2017C16.5647 13.8427 16.5647 13.8395 16.9418 13.8427C19.4155 13.861 21.8881 13.89 24.3618 13.8965C27.8312 13.9061 31.3017 13.8986 34.7711 13.8986H35.1438V21.2634H23.9042V24.9683H50.0096V10.1711H49.6906C37.5842 10.1711 25.4778 10.1722 13.3714 10.1636C13.0749 10.1636 13.0191 10.2517 13.0191 10.5269C13.0255 26.3204 13.0255 42.1129 13.0191 57.9065C13.0191 58.1784 13.0706 58.273 13.3703 58.2719C18.0868 58.2612 22.8043 58.2644 27.5208 58.2644C27.6217 58.2644 27.7216 58.2558 27.8634 58.2493V47.1915H46.2201V65.5539C46.1288 65.5582 46.0547 65.5646 45.9817 65.5646C40.987 65.5861 35.9934 65.6205 30.9988 65.6259C22.7087 65.6366 14.4186 65.6291 6.12965 65.6291C5.99861 65.6291 5.86757 65.6345 5.73652 65.6377H5.73438ZM38.9118 58.2063V54.5594H35.1825V58.2063H38.9118Z"
                                        fill="#264642"></path>
                                    <path
                                        d="M38.8203 76.7299V69.3641H50.0169V47.1925H57.2737C57.2812 47.3021 57.2952 47.4107 57.2952 47.5182C57.2952 57.1626 57.2952 66.806 57.2952 76.4505C57.2952 76.544 57.2834 76.6375 57.2769 76.7299H38.8214H38.8203Z"
                                        fill="#264642"></path>
                                    <path d="M46.1715 21.1946H38.9609V13.9728H46.1715V21.1946Z" fill="#264642"></path>
                                    <path
                                        d="M57.2757 43.4275H50.0469V36.1831C50.1575 36.1831 50.2585 36.1831 50.3584 36.1831C52.5506 36.1831 54.7429 36.1885 56.9363 36.1766C57.2145 36.1756 57.3026 36.2411 57.3004 36.5313C57.2875 38.7251 57.294 40.9188 57.2929 43.1136C57.2929 43.2136 57.2822 43.3135 57.2757 43.4275Z"
                                        fill="#264642"></path>
                                    <path d="M46.3088 43.5166H24.0305V54.5928H16.8242V36.0272H46.3088V43.5156V43.5166Z"
                                        fill="#768C88"></path>
                                    <path
                                        d="M5.62891 69.3051H35.3391V76.7375H5.62891C5.62891 74.26 5.62891 71.7825 5.62891 69.3051Z"
                                        fill="#768C88">
                                    </path>
                                </svg>
                                 </a>
                             </div>
                             <br>

                             {{-- <h4 class="font-size-18 text-muted mt-2 text-center">Welcome Back!</h4>
                             <p class="mb-5 text-center">Sign in to continue to Glowing.</p> --}}

                             <form method="POST" action="{{ route('login') }}">
                                 @csrf
                                 <div class="mb-4">
                                     <label class="form-label" for="email">Email</label>
                                     <input type="email" class="form-control @error('email') is-invalid @enderror"
                                         id="email" name="email" value="{{ old('email') }}"
                                         placeholder="Enter email">
                                     @error('email')
                                         <span class="text-danger">{{ $message }}</span>
                                     @enderror
                                 </div>
                                 <div class="mb-4">
                                     <label class="form-label" for="password">Password</label>
                                     <input type="password" class="form-control @error('password') is-invalid @enderror"
                                         id="password" name="password" placeholder="Enter password">
                                     @error('password')
                                         <span class="text-danger">{{ $message }}</span>
                                     @enderror
                                 </div>
                                 <div class="d-grid mt-4">
                                     <button class="btn btn-primary waves-effect waves-light" type="submit">Log
                                         In</button>
                                 </div>
                             </form>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>

 </body>
 <script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer">

    @if(Session::has('message'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.success("{{ Session::get('message') }}");
    @endif

    @if(Session::has('error'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.error("{{ Session::get('error') }}");
    @endif

    @if(Session::has('info'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.info("{{ Session::get('info') }}");
    @endif

    @if(Session::has('warning'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.warning("{{ Session::get('warning') }}");
    @endif
</script>

 </html>
