<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<title>Menu Microlins</title>

  <link rel="icon" href="Menu-Microlins.ico" type="image/x-icon" />
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

 <link rel="stylesheet" href="style.css" />
</head>
<body>
  <div class="container">
    <header class="appbar">
      <div class="brand">
        <div class="logo"></div>
        <div>
          <h1>Microlins — Menu</h1>
          <p>Escolha sua Atividade</p>
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
            <!--<div class="tag">Curso</div> -->
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

<script src="script.js"></script>
</body>
</html>



