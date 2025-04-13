    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input, select, textarea, button {
            width: 100%;
            margin-top: 5px;
            padding: 8px;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
<h1 class="mt-0 pt-0 text-center">Ավելացնել նոր հաճախորդ</h1>
<form action="" method="POST" enctype="multipart/form-data">
    <?= get_csrf_field();?>
    <label for="first_name">Անուն</label>
    <input type="text" id="first_name" name="first_name" required>

    <label for="last_name">Ազգանուն</label>
    <input type="text" id="last_name" name="last_name" required>

    <label for="age">Տարիք</label>
    <input type="number" id="age" name="age" min="0" required>

    <label for="gender">Սեռ</label>
    <select id="gender" name="gender" required>
        <option value="" disabled selected>Ընտրել սեռը</option>
        <option value="male">իգական</option>
        <option value="female">արական</option>
        <option value="other">այլ</option>
    </select>

    <label for="contact">Հեռախոսահամար</label>
    <input type="tel" id="contact" name="contact"  placeholder="1234567890" required>

    <label for="medical-history">Բժշկական պատմություն</label>
    <textarea id="medical-history" name="medical-history" rows="4"></textarea>

    <label for="image_name">Ներբեռնել նկար</label>
    <input type="file" id="image_name" name="image_name" accept="image/*"><br><br>

    <label for="image_name2">Ներբեռնել նկար</label>
    <input type="file" id="image_name2" name="image_name2" accept="image/*"><br><br>

    <button type="submit">Ավելացնել</button>
</form>