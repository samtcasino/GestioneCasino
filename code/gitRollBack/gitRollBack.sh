gitResult=$(git log --oneline | sed -n 2p)
gitCommitId="$(cut -d' ' -f1 <<<"$s")"
git checkout $gitCommitId
git push https://JenkinsCasino:Casin02018@github.com/samtcasino/GestioneCasino.git --all
