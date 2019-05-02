<table class="form-table"> 
    <tr>
        <th><?php _e("Choix de l'icone"); ?></th>
        <td>
            <select name="labs_choix_icone" id="labs_choix_icone">
                <!-- Maintenant que le tableau a été traité et renvoyé dans cette vue, on peut se servir de la clé devant laquelle on rajoute un '$' pour récupérer la valeur qui lui a été attribuée. -->
                <!-- On passe notre clé de $icone_choisi à $icone car on utilise une function compact dans ServicesDetailsMetabox qui elle génère une clé du même nom que la variable passée. -->
                <!-- On fait en sorte que l'option soit sélectionnée en fonction de la valeur récupérée dans la base de données. -->
                <option value="">--</option>
                 <option value="flaticon-001-picture" <?php echo ($icone == "flaticon-001-picture" ? "selected" : ""); ?>>
                    <p>Picture</p>
                </option>
                <option value="flaticon-002-caliper" <?php echo ($icone == "flaticon-002-caliper" ? "selected" : ""); ?>>
                    <p>Caliper</p>
                </option>

                <option value="flaticon-003-energy-drink" <?php echo ($icone == "flaticon-003-energy-drink" ? "selected" : ""); ?>>
                    <p>Drink</p>
                </option>
                <option value="flaticon-004-build" <?php echo ($icone == "flaticon-004-build002-caliper" ? "selected" : ""); ?>>
                    <p>Build</p>
                </option>
                <option value="flaticon-005-thinking-1" <?php echo ($icone == "flaticon-005-thinking-1" ? "selected" : ""); ?>>
                    <p>Thinking</p>
                </option>
                <option value="flaticon-006-prism" <?php echo ($icone == "flaticon-006-prism" ? "selected" : ""); ?>>
                    <p>Prism</p>
                </option>
                <option value="flaticon-007-paint" <?php echo ($icone == "flaticon-007-paint" ? "selected" : ""); ?>>
                    <p>Paint</p>
                </option>
                <option value="flaticon-008-team" <?php echo ($icone == "flaticon-008-team" ? "selected" : ""); ?>>
                    <p>Team</p>
                </option>
                <option value="flaticon-009-idea-3" <?php echo ($icone == "flaticon-009-idea-3" ? "selected" : ""); ?>>
                    <p>Idea</p>
                </option>
                <option value="flaticon-010-diamond" <?php echo ($icone == "flaticon-010-diamond" ? "selected" : ""); ?>>
                    <p>Diamond</p>
                </option>
            </select>
        </td>
    </tr>
</table>

<!-- .flaticon-011-compass:before { content: "\f10a"; }
.flaticon-012-cube:before { content: "\f10b"; }
.flaticon-013-puzzle:before { content: "\f10c"; }
.flaticon-014-magic-wand:before { content: "\f10d"; }
.flaticon-015-book:before { content: "\f10e"; }
.flaticon-016-vision:before { content: "\f10f"; }
.flaticon-017-notebook:before { content: "\f110"; }
.flaticon-018-laptop-1:before { content: "\f111"; }
.flaticon-019-coffee-cup:before { content: "\f112"; }
.flaticon-020-creativity:before { content: "\f113"; }
.flaticon-021-thinking:before { content: "\f114"; }
.flaticon-022-branding:before { content: "\f115"; }
.flaticon-023-flask:before { content: "\f116"; }
.flaticon-024-idea-2:before { content: "\f117"; }
.flaticon-025-imagination:before { content: "\f118"; }
.flaticon-026-search:before { content: "\f119"; }
.flaticon-027-monitor:before { content: "\f11a"; }
.flaticon-028-idea-1:before { content: "\f11b"; }
.flaticon-029-sketchbook:before { content: "\f11c"; }
.flaticon-030-computer:before { content: "\f11d"; }
.flaticon-031-scheme:before { content: "\f11e"; }
.flaticon-032-explorer:before { content: "\f11f"; }
.flaticon-033-museum:before { content: "\f120"; }
.flaticon-034-cactus:before { content: "\f121"; }
.flaticon-035-smartphone:before { content: "\f122"; }
.flaticon-036-brainstorming:before { content: "\f123"; }
.flaticon-037-idea:before { content: "\f124"; }
.flaticon-038-graphic-tool-1:before { content: "\f125"; }
.flaticon-039-vector:before { content: "\f126"; }
.flaticon-040-rgb:before { content: "\f127"; }
.flaticon-041-graphic-tool:before { content: "\f128"; }
.flaticon-042-typography:before { content: "\f129"; }
.flaticon-043-sketch:before { content: "\f12a"; }
.flaticon-044-paint-bucket:before { content: "\f12b"; }
.flaticon-045-video-player:before { content: "\f12c"; }
.flaticon-046-laptop:before { content: "\f12d"; }
.flaticon-047-artificial-intelligence:before { content: "\f12e"; }
.flaticon-048-abstract:before { content: "\f12f"; }
.flaticon-049-projector:before { content: "\f130"; }
.flaticon-050-satellite:before { content: "\f131"; } -->