import numpy

clear = open("apex_data.txt", "w")
clear.close()

with open("apex_raw.csv") as f:
    names = []
    scores = []
    for line in f:
        arr = line.split(",")
        names.push(arr[0].lower())
        scores.push(int(arr[1]))

i = 0
while i < len(names):
    current_name = names[i]
    per_name_score = []
    for index,name in enumerate(names):
        if name == current_name:
            per_name_score.push(scores[index])
    np_name_scores = numpy.array(per_name_score)
    to_display = [numpy.mean(np_name_scores), numpy.amax(np_name_scores), numpy.amin(np_name_scores), numpy.std(np_name_scores)]
    with open("apex_data.txt", "a") as f:
        f.write("<tr>\n<td>{}</td>\n<td>{}</td>\n<td>{}</td>\n<td>{}</td>\n<td>{}</td>\n</tr>".format(current_name, to_display[0], to_display[1], to_display[2], to_display[3]))
