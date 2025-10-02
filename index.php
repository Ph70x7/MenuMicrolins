<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<title>Menu Moderno — Microlins</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>
  /* === SEU CSS ORIGINAL INALTERADO === */
  :root{
    --bg:#0f1724;
    --card:#0b1220cc;
    --accent:#6ee7b7;
    --muted:#9aa6b2;
    --glass-border: rgba(255,255,255,0.06);
    --radius:18px;
    --gap:20px;
    --transition: 250ms cubic-bezier(.2,.9,.3,1);
  }
  *{box-sizing:border-box}
  html,body{height:100%;margin:0;font-family:Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;}
  body{
    background:
      radial-gradient(1000px 600px at 10% 10%, rgba(99,102,241,0.12), transparent 10%),
      radial-gradient(800px 500px at 90% 90%, rgba(56,189,248,0.06), transparent 10%),
      var(--bg);
    color:#e6eef6;
    -webkit-font-smoothing:antialiased;
    display:flex;
    align-items:center;
    justify-content:center;
    padding:40px;
    transform: scale(0.75) translateY(16vh);
    transform-origin: top center;
  }
  .container{width:100%;max-width:1200px;margin:0 auto;}
  header.appbar{display:flex;gap:16px;align-items:center;margin-bottom:24px;flex-wrap:wrap}
  .brand{display:flex;gap:12px;align-items:center}
  .logo{width:56px;height:56px;border-radius:12px;background:linear-gradient(135deg,#4f46e5,var(--accent));display:flex;align-items:center;justify-content:center;font-weight:700;color:white;box-shadow: 0 8px 30px rgba(79,70,229,0.18);}
  .brand h1{font-size:18px;margin:0}
  .brand p{margin:0;font-size:13px;color:var(--muted)}
  .grid{display:grid;grid-template-columns: repeat(4, 1fr);gap:var(--gap)}
  .card{position:relative;display:flex;flex-direction:column;align-items:center;gap:12px;padding:18px;border-radius:var(--radius);background: linear-gradient(180deg, rgba(255,255,255,0.03), rgba(255,255,255,0.01));border: 1px solid var(--glass-border);backdrop-filter: blur(8px) saturate(120%);transition: transform var(--transition), box-shadow var(--transition), border-color var(--transition);text-decoration:none;color:inherit;min-height:200px;}
  .card:hover{transform: translateY(-8px) scale(1.01);box-shadow:0 20px 50px rgba(2,6,23,0.6);border-color:rgba(255,255,255,0.12)}
  .card .icon{width:84px;height:84px;border-radius:16px;display:flex;align-items:center;justify-content:center;background:linear-gradient(135deg, rgba(255,255,255,0.03), rgba(255,255,255,0.02));box-shadow: inset 0 -6px 18px rgba(0,0,0,0.25)}
  .card .icon img{width:64px;height:64px;display:block;object-fit:contain}
  .card h3{margin:0;font-size:16px}
  .card p{margin:0;font-size:13px;color:var(--muted);text-align:center}
  .tag{position:absolute;top:14px;right:14px;background:rgba(0,0,0,0.25);color:var(--muted);padding:6px 10px;border-radius:999px;font-size:12px;border:1px solid rgba(255,255,255,0.03)}
  .card-actions{margin-top:auto;width:100%;display:flex;gap:8px;justify-content:center}
  .btn-action{padding:8px 12px;border-radius:10px;border:0;background:transparent;color:var(--accent);cursor:pointer;font-weight:600;font-size:13px;border:1px solid rgba(110,231,183,0.12);transition: all var(--transition);}
  .btn-action:hover{transform: translateY(-3px);box-shadow:0 10px 30px rgba(110,231,183,0.06)}
  @media (max-width:1100px){.grid{grid-template-columns:repeat(3,1fr)}}
  @media (max-width:800px){.grid{grid-template-columns:repeat(2,1fr)}}
  @media (max-width:480px){.grid{grid-template-columns:repeat(1,1fr)}}
  /* === MODAL === */
  .modal-overlay {position: fixed;inset: 0;background: rgba(0,0,0,0.6);display: flex;align-items: center;justify-content: center;z-index: 2000;opacity: 0;pointer-events: none;transition: opacity .3s;}
  .modal-overlay.active {opacity: 1;pointer-events: all;}
  .modal-wrapper {position: relative;width: 90%;max-width: 700px;}
  .modal {background: var(--card);border: 1px solid var(--glass-border);border-radius: var(--radius);padding: 24px;backdrop-filter: blur(12px) saturate(120%);box-shadow: 0 20px 50px rgba(0,0,0,0.5);animation: scaleIn .3s forwards;width:100%;}
  @keyframes scaleIn {from {transform:scale(.85);opacity:0;}to {transform:scale(1);opacity:1;}}
  .modal h2 {margin-top:0;color:var(--accent);font-size:18px}
  .close-btn {position:absolute;top:12px;right:16px;border:0;background:transparent;font-size:22px;color:var(--muted);cursor:pointer;}
  .modal ul {list-style:none;padding:0;margin:0}
  .modal ul li {margin-bottom:8px;padding:10px;border-radius:10px;background:rgba(255,255,255,0.04);display:flex;justify-content:space-between;align-items:center;font-size:14px;}
  .modal-viewer {display:none;flex-direction:column;gap:12px;margin-top:12px}
  .modal-viewer iframe {width:100%;height:400px;border:none;border-radius:var(--radius);background:#111;}
  .back-btn {background:var(--accent);border:0;padding:8px 14px;border-radius:8px;cursor:pointer;color:#0f1724;font-weight:600;align-self:flex-start;}
</style>
</head>
<body>
  <div class="container">
    <header class="appbar">
      <div class="brand">
        <div class="logo">M</div>
        <div>
          <h1>Microlins — Menu</h1>
          <p>Escolha seu curso ou ferramenta</p>
        </div>
      </div>
    </header>

    <main>
      <section class="grid" id="cards">

        <?php
        // lista de cards: nome => pasta
        $cards = [
          "Word" => "word",
          "Excel" => "excel",
          "PowerPoint" => "ppt",
          "Informática" => "informatica",
          "Programação" => "programacao",
          "Redes" => "redes",
          "CorelDraw" => "corel",
          "Canva" => "canva",
          "Photoshop" => "ps",
          "Illustrator" => "ai",
          "After Effects" => "ae"
        ];

        $icons = [
          "word" => "https://img.icons8.com/color/240/000000/microsoft-word-2019.png",
          "excel" => "https://img.icons8.com/color/240/000000/microsoft-excel-2019.png",
          "ppt" => "https://img.icons8.com/color/240/000000/microsoft-powerpoint-2019.png",
          "informatica" => "https://img.icons8.com/fluency/240/computer.png",
          "programacao" => "https://img.icons8.com/fluency/240/code.png",
          "redes" => "https://img.icons8.com/fluency/240/network.png",
          "corel" => "https://img.icons8.com/color/240/coreldraw.png",
          "canva" => "https://img.icons8.com/color/240/canva.png",
          "ps" => "https://img.icons8.com/color/240/adobe-photoshop--v1.png",
          "ai" => "https://img.icons8.com/color/240/adobe-illustrator.png",
          "ae" => "https://img.icons8.com/color/240/adobe-after-effects.png"
        ];

        foreach ($cards as $nome => $pasta):
          $arquivos = glob("pdfs/$pasta/*.pdf");
          $files = $arquivos ? implode(",", $arquivos) : "";
        ?>
          <a href="#" class="card" data-files="<?= htmlspecialchars($files, ENT_QUOTES) ?>">
            <div class="tag">Curso</div>
            <div class="icon"><img src="<?= $icons[$pasta] ?>" alt="<?= $nome ?>"></div>
            <h3><?= $nome ?></h3>
            <p><?= ($pasta=="word"?"Crie e edite documentos":
                     ($pasta=="excel"?"Análises, tabelas e gráficos":
                     ($pasta=="ppt"?"Apresentações impactantes":
                     ($pasta=="informatica"?"Conceitos essenciais":
                     ($pasta=="programacao"?"Algoritmos e lógica":
                     ($pasta=="redes"?"Instalação e manutenção":
                     ($pasta=="corel"?"Design vetorial":
                     ($pasta=="canva"?"Criação gráfica rápida":
                     ($pasta=="ps"?"Edição de imagens":
                     ($pasta=="ai"?"Logos e vetores":"Motion graphics")))))))))) ?></p>
            <div class="card-actions"><button class="btn-action">Abrir</button></div>
          </a>
        <?php endforeach; ?>

      </section>
    </main>
  </div>

  <!-- === MODAL ORIGINAL === -->
  <div class="modal-overlay" id="modal">
    <div class="modal-wrapper">
      <div class="modal">
        <button class="close-btn" id="closeModal">×</button>
        <h2 id="modalTitle">Atividades</h2>
        <ul id="modalList"></ul>
        <div class="modal-viewer" id="modalViewer">
          <button class="back-btn" id="backToList">← Voltar</button>
          <iframe id="pdfFrame" src=""></iframe>
          <a id="downloadLink" href="#" download class="btn-action">⬇ Baixar PDF</a>
        </div>
      </div>
    </div>
  </div>

<script>
/* === JS ADAPTADO (sem template literals e sem selecionar botões do modal) === */
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
</script>
</body>
</html>
