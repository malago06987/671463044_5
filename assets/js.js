      // แสดงภาพตัวอย่างเมื่อเลือกไฟล์ (Add)
        function previewAddImage(event) {
            const img = document.getElementById('addPreview');
            img.src = URL.createObjectURL(event.target.files[0]);
            img.style.display = 'block';
        }
        // แสดงภาพตัวอย่างเมื่อเลือกไฟล์ (Edit)
        function previewEditImage(event) {
            const img = document.getElementById('editPreview');
            img.src = URL.createObjectURL(event.target.files[0]);
            img.style.display = 'block';
        }




    // ตรวจการสมัครเเละเด้งpopupมา
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('reg_success')) {
        var myModal = new bootstrap.Modal(document.getElementById('showLogin'));
        myModal.show();
    }
