const modal = document.getElementById("modal");
const closeModal = document.getElementById("closeModal");
const modalList = document.getElementById("modalList");
const modalTitle = document.getElementById("modalTitle");
const modalViewer = document.getElementById("modalViewer");
const pdfFrame = document.getElementById("pdfFrame");
const downloadLink = document.getElementById("downloadLink");
const backToList = document.getElementById("backToList");

// AGORA pegamos os CARDS diretamente (não os botões)
const cards = document.querySelectorAll(".card");

cards.forEach(function(card) {
  card.addEventListener("click", function(e) {

    e.preventDefault(); // impede o <a href="#"> de recarregar a página
    
    const nameEl = card.querySelector("h3");
    const name = nameEl ? nameEl.textContent.trim() : "";

    const filesRaw = card.dataset.files || "";
    const files = filesRaw.split(",").map(function(f) { 
      return f.trim(); 
    }).filter(function(f) { 
      return f.length > 0; 
    });

    // limpa lista
    modalList.innerHTML = "";

    if (files.length === 0) {
      const li = document.createElement("li");
      li.textContent = "Nenhuma atividade encontrada.";
      modalList.appendChild(li);
    } else {
      files.forEach(function(file) {
        const li = document.createElement("li");

        // título do arquivo (nome sem extensão)
        const titleText = document.createTextNode(
          file.split("/").pop().replace(".pdf", "")
        );
        li.appendChild(titleText);

        const controls = document.createElement("div");

        // botão visualizar
        const viewBtn = document.createElement("button");
        viewBtn.type = "button";
        viewBtn.className = "btn-action";
        viewBtn.textContent = "👁 Visualizar";
        viewBtn.addEventListener("click", function(ev) {
          ev.stopPropagation(); // evita fechar a lista
          openViewer(file);
        });

        // download
        const downloadA = document.createElement("a");
        downloadA.className = "btn-action";
        downloadA.href = file;
        downloadA.setAttribute("download", "");
        downloadA.textContent = "⬇ Download";

        controls.appendChild(viewBtn);
        controls.appendChild(downloadA);
        li.appendChild(controls);
        modalList.appendChild(li);
      });
    }

    modalTitle.textContent = "Atividades — " + name;
    modalViewer.style.display = "none";
    modalList.style.display = "block";
    modal.classList.add("active");
  });
});

// Viewer
window.openViewer = function(file) {
  pdfFrame.src = file;
  downloadLink.href = file;
  modalList.style.display = "none";
  modalViewer.style.display = "flex";
};

// Voltar
backToList.addEventListener("click", function() {
  modalViewer.style.display = "none";
  modalList.style.display = "block";
  pdfFrame.src = "";
});

// Fechar modal
closeModal.addEventListener("click", function() {
  modal.classList.remove("active");
});

// Fechar clicando fora
modal.addEventListener("click", function(e) {
  if (e.target === modal) modal.classList.remove("active");
});
