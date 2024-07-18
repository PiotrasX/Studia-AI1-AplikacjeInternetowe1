git init
git config --local user.name "projekt"
git config --local user.email "projekt@ur.edu.pl"
git add --all
git commit -m "Projekt Akademia Nauki"
git archive --format=zip HEAD -o ../akademia_nauki_archiwum.zip
pause
