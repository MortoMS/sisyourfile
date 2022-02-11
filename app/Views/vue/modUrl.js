const file = require('fs');

file.readFile('../build/viewVue.php', 'utf-8', function (err, data) {
    if (err) throw err;

    const result = data.replace(/(\/..\/..\/..\/public)/g, '');

    file.writeFile(
        '../build/viewVue.php', 
        result,
        'utf-8',
        function (err) {
            if (err) throw err;
        }
    );
});