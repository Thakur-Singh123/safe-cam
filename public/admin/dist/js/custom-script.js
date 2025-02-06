document.getElementById('mobile_no').addEventListener('input', function (e) {
    this.value = this.value.replace(/[^0-9]/g, ''); 
    if (this.value.length > 10) { 
        this.value = this.value.substring(0, 10);
    }
});
