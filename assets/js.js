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



  // เเก้ไขหมวดหมู่
const editModal = document.getElementById('editCategoryModal');
editModal.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;
    document.getElementById('edit_id').value = button.getAttribute('data-id');
    document.getElementById('edit_name').value = button.getAttribute('data-name');
});

