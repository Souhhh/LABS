<table class="form-table">
    <tr>
        <th><?php _e("Choix de l'icone"); ?></th>
        <td>
            <select name="labs_choix_icone" id="labs_choix_icone">
                <!-- Maintenant que le tableau a été traité et renvoyé dans cette vue, on peut se servir de la clé devant laquelle on rajoute un '$' pour récupérer la valeur qui lui a été attribuée. -->
                <!-- On passe notre clé de $icone_choisi à $icone car on utilise une function compact dans ServicesDetailsMetabox qui elle génère une clé du même nom que la variable passée. -->
                <!-- On fait en sorte que l'option soit sélectionnée en fonction de la valeur récupérée dans la base de données. -->
                <option value="">--</option>
                <option value="flaticon-001-picture" <?php echo ($icone == "flaticon-001-picture" ? 'selected' : ''); ?>>
                    <i class="flaticon-001-picture"></i>
                    <p>Image</p>
                </option>

                <option value="flaticon-002-caliper" <?php echo ($icone == "flaticon-002-caliper" ? 'selected' : ''); ?>>
                    <i class="flaticon-002-caliper"></i>
                    <p>Caliper</p>
                </option>

                <option value="flaticon-003-energy-drink" <?php echo ($icone == "flaticon-003-energy-drink" ? 'selected' : ''); ?>>
                    <i class="flaticon-003-energy-drink"></i>
                    <p>Boisson</p>
                </option>

                <option value="flaticon-004-build" <?php echo ($icone == "flaticon-004-build" ? "selected" : ""); ?>>
                    <i class="flaticon-004-build"></i>
                    <p>construire</p>
                </option>

                <option value="flaticon-005-thinking-1" <?php echo ($icone == "flaticon-005-thinking-1" ? "selected" : ""); ?>>
                    <i class="flaticon-005-thinking-1"></i>
                    <p>penser</p>
                </option>
                <!-- 5-10 -->
                <option value="flaticon-006-prism" <?php echo ($icone == "flaticon-006-prism" ? "selected" : ""); ?>>
                    <i class="flaticon-006-prism"></i>
                    <p>Prisme</p>
                </option>

                <option value="flaticon-007-paint" <?php echo ($icone == "flaticon-007-paint" ? "selected" : ""); ?>>
                    <i class="flaticon-007-paint"></i>
                    <p>Peinture</p>
                </option>


                <option value="flaticon-008-team" <?php echo ($icone == "flaticon-008-team" ? "selected" : ""); ?>>
                    <i class="flaticon-008-team"></i>
                    <p>Equipe</p>
                </option>

                <option value="flaticon-009-idea-3" <?php echo ($icone == "flaticon-009-idea-3" ? "selected" : ""); ?>>
                    <i class="flaticon-009-idea-3"></i>
                    <p>Idée</p>
                </option>

                <option value="flaticon-010-diamond" <?php echo ($icone == "flaticon-010-diamond" ? "selected" : ""); ?>>
                    <i class="flaticon-010-diamond"></i>
                    <p>Diamand</p>
                </option>
                <!-- 10-15 -->
                <option value="flaticon-011-compass" <?php echo ($icone == "flaticon-011-compass" ? "selected" : ""); ?>>
                    <i class="flaticon-011-compass"></i>
                    <p>Compas</p>
                </option>

                <option value="flaticon-012-cube" <?php echo ($icone == "flaticon-012-cube" ? "selected" : ""); ?>>
                    <i class="flaticon-012-cube"></i>
                    <p>Cube</p>
                </option>

                <option value="flaticon-013-puzzle" <?php echo ($icone == "flaticon-013-puzzle" ? "selected" : ""); ?>>
                    <i class="flaticon-013-puzzle"></i>
                    <p>Puzzle</p>
                </option>

                <option value="flaticon-014-magic-wand">
                    <?php echo ($icone == "flaticon-014-magic-wand" ? "selected" : ""); ?>
                    <i class="flaticon-014-magic-wand"></i>
                    <p>Gand</p>
                </option>

                <option value="flaticon-015-book" <?php echo ($icone == "flaticon-015-book" ? "selected" : ""); ?>>
                    <i class="flaticon-015-book"></i>
                    <p>Livre</p>
                </option>

                <!-- 15-20 -->
                <option value="flaticon-016-vision" <?php echo ($icone == "flaticon-016-vision" ? "selected" : ""); ?>>
                    <i class="flaticon-016-vision"></i>
                    <p>Vision</p>
                </option>

                <option value="flaticon-017-notebook" <?php echo ($icone == "flaticon-017-notebook" ? "selected" : ""); ?>>
                    <i class="flaticon-017-notebook"></i>
                    <p>Notebook</p>
                </option>

                <option value="flaticon-018-laptop-1" <?php echo ($icone == "flaticon-018-laptop-1" ? "selected" : ""); ?>>
                    <i class="flaticon-018-laptop-1"></i>
                    <p>Laptop</p>
                </option>

                <option value="flaticon-019-coffee-cup" <?php echo ($icone == "flaticon-019-coffee-cup" ? "selected" : ""); ?>>
                    <i class="flaticon-019-coffee-cup"></i>
                    <p>Tasse de café</p>
                </option>

                <option value="flaticon-020-creativity" <?php echo ($icone == "flaticon-020-creativity" ? "selected" : ""); ?>>
                    <i class="flaticon-020-creativity"></i>
                    <p> Créativité </p>
                </option>

                <!-- 20-25 -->

                <option value="flaticon-021-thinking" <?php echo ($icone == "flaticon-021-thinking" ? "selected" : ""); ?>>
                    <i class="flaticon-021-thinking"></i>
                    <p>Réfléchir</p>
                </option>

                <option value="flaticon-022-branding" <?php echo ($icone == "flaticon-022-branding" ? "selected" : ""); ?>>
                    <i class="flaticon-022-branding"></i>
                    <p>Marque</p>
                </option>

                <option value="flaticon-023-flask" <?php echo ($icone == "flaticon-023-flask" ? "selected" : ""); ?>>
                    <i class="flaticon-023-flask"></i>
                    <p>Potion</p>
                </option>

                <option value="flaticon-024-idea-2" <?php echo ($icone == "flaticon-024-idea-2" ? "selected" : ""); ?>>
                    <i class="flaticon-024-idea-2"></i>
                    <p>Idée</p>
                </option>

                <option value="flaticon-025-imagination" <?php echo ($icone == "flaticon-025-imagination" ? "selected" : ""); ?>>
                    <i class="flaticon-025-imagination"></i>
                    <p>Imagination</p>
                </option>

                <!-- 25-30 -->

                <option value="flaticon-026-search" <?php echo ($icone == "flaticon-026-search" ? "selected" : ""); ?>>
                    <i class="flaticon-026-search"></i>
                    <p>Recherche</p>
                </option>

                <option value="flaticon-027-monitor" <?php echo ($icone == "flaticon-027-monitor" ? "selected" : ""); ?>>
                    <i class="flaticon-027-monitor"></i>
                    <p>Monitor</p>
                </option>

                <option value="flaticon-028-idea-1" <?php echo ($icone == "flaticon-028-idea-1" ? "selected" : ""); ?>>
                    <i class="flaticon-028-idea-1"></i>
                    <p>Idée 2 </p>
                </option>

                <option value="flaticon-029-sketchbook" <?php echo ($icone == "flaticon-029-sketchbook" ? "selected" : ""); ?>>
                    <i class="flaticon-029-sketchbook"></i>
                    <p>Carnet de dessin</p>
                </option>

                <option value="flaticon-030-computer">
                    <?php echo ($icone == "flaticon-030-computer" ? "selected" : ""); ?>
                    <i class="flaticon-030-computer"></i>
                    <p>Computer</p>
                </option>
                <!-- 30-35 -->

                <option value="flaticon-031-scheme">
                    <?php echo ($icone == "flaticon-031-scheme" ? "selected" : ""); ?>
                    <i class="flaticon-031-scheme"></i>
                    <p>Schéma</p>
                </option>

                <option value="flaticon-032-explorer">
                    <?php echo ($icone == "flaticon-032-explorer" ? "selected" : ""); ?>
                    <i class="flaticon-032-explorer"></i>
                    <p>Explorateur</p>
                </option>

                <option value="flaticon-033-museum">
                    <?php echo ($icone == "flaticon-033-museum" ? "selected" : ""); ?>
                    <i class="flaticon-033-museum"></i>
                    <p>Musée</p>
                </option>

                <option value="flaticon-034-cactus">
                    <?php echo ($icone == "flaticon-034-cactus" ? "selected" : ""); ?>
                    <i class="flaticon-034-cactus"></i>
                    <p>Cactus</p>
                </option>

                <option value="flaticon-035-smartphone">
                    <?php echo ($icone == "flaticon-035-smartphone" ? "selected" : ""); ?>
                    <i class="flaticon-035-smartphone"></i>
                    <p>Smartphone</p>
                </option>
                <!-- 35-40 -->
                <option value="flaticon-036-brainstorming">
                    <?php echo ($icone == "flaticon-036-brainstorming" ? "selected" : ""); ?>
                    <i class="flaticon-036-brainstorming"></i>
                    <p>Brainstorming</p>
                </option>

                <option value="flaticon-037-idea">
                    <?php echo ($icone == "flaticon-037-idea" ? "selected" : ""); ?>
                    <i class="flaticon-037-idea"></i>
                    <p>Idéaux</p>
                </option>

                <option value="flaticon-038-graphic-tool-1">
                    <?php echo ($icone == "flaticon-038-graphic-tool-1" ? "selected" : ""); ?>
                    <i class="flaticon-038-graphic-tool-1"></i>
                    <p>Graphic</p>
                </option>

                <option value="flaticon-039-vector">
                    <?php echo ($icone == "flaticon-039-vector" ? "selected" : ""); ?>
                    <i class="flaticon-039-vector"></i>
                    <p>Vecteur</p>
                </option>

                <option value="flaticon-040-rgb">
                    <?php echo ($icone == "flaticon-040-rgb" ? "selected" : ""); ?>
                    <i class="flaticon-040-rgb"></i>
                    <p>Rbg</p>
                </option>
                <!-- 40-45 -->
                <option value="flaticon-041-graphic-tool">
                    <?php echo ($icone == "flaticon-041-graphic-tool" ? "selected" : ""); ?>
                    <i class="flaticon-041-graphic-tool"></i>
                    <p>Tool</p>
                </option>

                <option value="flaticon-042-typography">
                    <?php echo ($icone == "flaticon-042-typography" ? "selected" : ""); ?>
                    <i class="flaticon-042-typography"></i>
                    <p>Typography</p>
                </option>

                <option value="flaticon-043-sketch">
                    <?php echo ($icone == "flaticon-043-sketch" ? "selected" : ""); ?>
                    <i class="flaticon-043-sketch"></i>
                    <p>Sketch</p>
                </option>

                <option value="flaticon-044-paint-bucket">
                    <?php echo ($icone == "flaticon-044-paint-bucket" ? "selected" : ""); ?>
                    <i class="flaticon-044-paint-bucket"></i>
                    <p>Bucket</p>
                </option>

                <option value="flaticon-045-video-player">
                    <?php echo ($icone == "flaticon-045-video-player" ? "selected" : ""); ?>
                    <i class="flaticon-045-video-player"></i>
                    <p>Video Player</p>
                </option>
                <!-- 45-50 -->
                <option value="flaticon-046-laptop">
                    <?php echo ($icone == "flaticon-046-laptop" ? "selected" : ""); ?>
                    <i class="flaticon-046-laptop"></i>
                    <p>Laptop 2</p>
                </option>

                <option value="flaticon-047-artificial-intelligence">
                    <?php echo ($icone == "flaticon-047-artificial-intelligence" ? "selected" : ""); ?>
                    <i class="flaticon-047-artificial-intelligence"></i>
                    <p>Intelligence artificielle</p>
                </option>

                <option value="flaticon-048-abstract">
                    <?php echo ($icone == "flaticon-048-abstract" ? "selected" : ""); ?>
                    <i class="flaticon-048-abstract"></i>
                    <p>Abstrait</p>
                </option>

                <option value="flaticon-049-projector">
                    <?php echo ($icone == "flaticon-049-projector" ? "selected" : ""); ?>
                    <i class="flaticon-049-projector"></i>
                    <p>Projecteur</p>
                </option>

                <option value="flaticon-050-satellite">
                    <?php echo ($icone == "flaticon-050-satellite" ? "selected" : ""); ?>
                    <i class="flaticon-050-satellite"></i>
                    <p>Sattelite</p>
                </option>
            </select>
        </td>
    </tr>
</table>
