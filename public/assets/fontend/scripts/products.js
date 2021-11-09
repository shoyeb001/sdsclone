console.log('dgt');
let showme = document.getElementById("ShowMe");
        let addClassNow = document.querySelector("#mNavSec");
        const fil = document.querySelector("#closebutton");

        let count = true;
        showme.addEventListener('click', () => {
            console.log('click');
            addClassNow.classList.toggle("classHide");
            val = addClassNow.classList.contains('classHide');
            // if (val) {
            //     $(document).ready(function () {
            //         console.log("This is added now");
            //         $(document).on('click', function (divclose) {
            //             if ($(divclose.target).closest("#filterid").length == 0) {
            //                 $("#filterid").hide();
            //             }
            //         })
            //     })
            // }
        })
        fil.addEventListener('click', () => {
            addClassNow.classList.remove("classHide");
        })
        // $(document).ready(function () {
        //     console.log("This is added now");
        //     $(document).on('click', function (divclose) {
        //         if ($(divclose.target).closest("#filterid").length == 0) {
        //             $("#filterid").hide();
        //         }
        //     })
        // })
