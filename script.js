const modal = document.getElementById("modal");
const closeModal = document.getElementById("closeModal");
const modalList = document.getElementById("modalList");
const modalTitle = document.getElementById("modalTitle");
const modalViewer = document.getElementById("modalViewer");
const pdfFrame = document.getElementById("pdfFrame");
const downloadLink = document.getElementById("downloadLink");
const backToList = document.getElementById("backToList");

// Seleciona apenas os botões de ação dentro dos cards (não pega os do modal)
const cardButtons = document.querySelectorAll(".card .btn-action");

cardButtons.forEach(function(btn) {
  btn.addEventListener("click", function(e) {
    e.preventDefault();
    e.stopPropagation();

    const card = this.closest(".card");
    if (!card) return; // segurança

    const nameEl = card.querySelector("h3");
    const name = nameEl ? nameEl.textContent.trim() : "";

    const filesRaw = card.dataset.files || "";
    const files = filesRaw.split(",").map(function(f) { return f.trim(); }).filter(function(f) { return f.length > 0; });

    // limpa lista anterior
    modalList.innerHTML = "";

    if (files.length === 0) {
      const li = document.createElement("li");
      li.textContent = "Nenhuma atividade encontrada.";
      modalList.appendChild(li);
    } else {
      files.forEach(function(file) {
        const li = document.createElement("li");

        // título do arquivo (nome sem extensão)
        const titleText = document.createTextNode(file.split("/").pop().replace(".pdf", ""));
        li.appendChild(titleText);

        const controls = document.createElement("div");

        // botão visualizar
        const viewBtn = document.createElement("button");
        viewBtn.type = "button";
        viewBtn.className = "btn-action";
        viewBtn.textContent = "👁 Visualizar";
        viewBtn.addEventListener("click", function(ev) {
          ev.stopPropagation();
          openViewer(file);
        });

        // link de download
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

window.openViewer = function(file) {
  pdfFrame.src = file;
  downloadLink.href = file;
  modalList.style.display = "none";
  modalViewer.style.display = "flex";
};

backToList.addEventListener("click", function() {
  modalViewer.style.display = "none";
  modalList.style.display = "block";
  pdfFrame.src = "";
});

closeModal.addEventListener("click", function() {
  modal.classList.remove("active");
});

modal.addEventListener("click", function(e) {
  if (e.target === modal) modal.classList.remove("active");
});