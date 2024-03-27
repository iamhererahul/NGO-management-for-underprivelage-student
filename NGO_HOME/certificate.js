function generateCertificate() {
    var name = document.getElementById("name").value;
    document.getElementById("certificate-name").textContent = name || "[Name]";
    var today = new Date();
    var date = today.toLocaleDateString('en-US');
    document.getElementById("certificate-date").textContent = date;
}

function downloadCertificate() {
    const certificate = document.querySelector('.certificate');
    const form = document.querySelector('.form');
    const buttons = document.querySelectorAll('button');
    buttons.forEach(button => {
        button.style.display = 'none';
    });
    const pdf = new jsPDF();
    pdf.html(certificate, {
        callback: function() {
            pdf.save("certificate.pdf");
            buttons.forEach(button => {
                button.style.display = 'inline-block';
            });
        }
    });
}