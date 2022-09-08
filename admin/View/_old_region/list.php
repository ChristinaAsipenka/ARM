<?php $this->theme->header(); ?>

   <!--  <main>
        <div class="container">
            <div class="row">
                <div class="col page-title">
                    <h5>
                        Реестр УНП
                        <a href="/ARM/admin/unp/create/">Создать новый</a>
                    </h5>
				</div>
            </div>

            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>УНП</th>
                    <th>Наименование</th>
                </tr>
                </thead>
                <tbody>
                <!---?php //foreach($unp as $one_unp): ?>
                <tr>
                    <th scope="row">
                        <!--?= //$one_unp['id'] ?>
                    </th>
                    <td>
                        <a href="/ARM/admin/unp/edit/<!--?= //$one_unp['id'] ?>">
                            <!--?= //$one_unp['unp'] ?>
                        </a>
                    </td>
                    <td>
                        <!--?= //$one_unp['name'] ?>
                    </td>
                </tr>
                <!--?php //endforeach; ?>
                </tbody>
            </table>
        </div>
    </main> -->

<?php $this->theme->footer(); ?>