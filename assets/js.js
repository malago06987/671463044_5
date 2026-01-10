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






