<?php

?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2>Ajouter une tâche</h2>
                    <form method="GET">
                        <!-- Champ Titre -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Titre</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?= $title ?>">
                            <?php if ($formSubmitted && isset($erreurs['title'])): ?>
                                <div class="text-danger"><?= $erreurs['title'] ?></div>
                            <?php endif; ?>
                        </div>

                        <!-- Champ Catégorie -->
                        <div class="mb-3">
                            <label for="category" class="form-label">Catégorie</label>
                            <select id="category" name="category" class="form-select">
                                <option value="" disabled selected>-- Veuillez faire une sélection --</option>
                                <?php foreach ($categories as $cat): ?>
                                    
                                    <option value="<?= htmlspecialchars($cat['name']) ?>"><?= htmlspecialchars($cat['name']) ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?php if ($formSubmitted && isset($erreurs['category'])): ?>
                                <div class="text-danger"><?= $erreurs['category'] ?></div>
                            <?php endif; ?>
                        </div>

                        <!-- Champ Date -->
                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" id="date" name="date" value="<?= $date ?>">
                            <?php if ($formSubmitted && isset($erreurs['date'])): ?>
                                <div class="text-danger"><?= $erreurs['date'] ?></div>
                            <?php endif; ?>
                        </div>

                        <!-- Champ Statut -->
                        <div class="mb-3">
                            <label for="status" class="form-label">Statut</label>
                            <select id="status" name="status" class="form-select">
                                <option value="" disabled selected>-- Veuillez faire une sélection --</option>
                                <?php foreach ($status as $stat): ?>
                                    <option value="<?= htmlspecialchars($stat['name']) ?>"><?= htmlspecialchars($stat['name'])?></option>
                                <?php endforeach; ?>
                            </select>
                            <?php if ($formSubmitted && isset($erreurs['status'])): ?>
                                <div class="text-danger"><?= $erreurs['status'] ?></div>
                            <?php endif; ?>
                        </div>

                        <!-- Champ Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"><?= $description ?></textarea>
                            <?php if ($formSubmitted && isset($erreurs['description'])): ?>
                                <div class="text-danger"><?= $erreurs['description'] ?></div>
                            <?php endif; ?>
                        </div>

                        <button type="submit" class="btn btn-success">Ajouter</button>
                        <a class="btn btn-primary" href="task-index.php"><span class="bi-arrow-left"></span> Annuler</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
