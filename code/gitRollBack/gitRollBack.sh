gitResult=$(git log --oneline | sed -n 2p)
gitCommitId="$(cut -d' ' -f1 <<<"$s")"
git checkout $gitCommitId
